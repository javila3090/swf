<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\User;
use App\Order;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //parent::__construct();

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /**
     * Show the application paywith stripe.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithStripe()
    {
        return view('.paywithstripe');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithStripe(Request $request)
    {
        $rules = array(
            'email' => 'required',
            'cardNumber' => 'required',
            'expire_date' => 'required',
            'cvv' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        $input = $request->all();
        if ($validator->fails()) {
            \Session::put('error', 'All fields are required!!');
            return redirect()->route('/');
        }else {
            $input = array_except($input,array('_token'));
            $stripe = Stripe::make('sk_test_dsmevhFlECFf8RWRzkvJHlLi');
            try {
                $expire_date=$request->input('expire_date');
                $expire_date = explode('/',$expire_date);
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number'    => $request->input('cardNumber'),
                        'exp_month' => $expire_date[0],
                        'exp_year'  => $expire_date[1],
                        'cvc'       => $request->input('cvv'),
                    ],
                ]);
                if (!isset($token['id'])) {
                    \Session::put('error','The Stripe Token was not generated correctly');
                    return redirect()->route('/');
                }
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount'   => $request->input('amount'),
                    'description' => 'Add in wallet',
                ]);
                if($charge['status'] == 'succeeded') {
                    $quantity = DB::table('quantity')->where('cost', '=', $request->input('amount'))->limit(1)->get(['quantity']);
                    foreach ($quantity as $v){
                        $quantity=$v->quantity;
                    }
                    $order = new Order(); // Creando el objeto del modelo
                    $order->email = $request->input('email');
                    $order->phone_number = "+".$request->input('phone_number');
                    $order->id_frecuency = $request->input('id_frecuency');
                    $order->quantity = $quantity;
                    $order -> save();
                    //\Session::put('success','Pay completed successfully');
                    //return redirect()->route('/');
                    return ("<div class='alert alert-dismissable alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>×</button>
                    Pay completed successfully
                    </div>");
                } else {
                    //\Session::put('error','Money not add in wallet!!');
                    //return redirect()->route('/');
                    return ("<div class='alert alert-dismissable alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>×</button>
                    Money not add in wallet
                    </div>");
                }
            } catch (Exception $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->route('/');
            } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->route('/');
            } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->route('/');
            }
        }
    }

    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }
    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
        ->setCancelUrl(URL::route('payment.status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('addmoney.paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('addmoney.paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error','Unknown error occurred');
        return Redirect::route('addmoney.paywithpaypal');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('addmoney.paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            \Session::put('success','Payment success');
            return Redirect::route('addmoney.paywithpaypal');
        }
        \Session::put('error','Payment failed');
        return Redirect::route('addmoney.paywithpaypal');
    }
}
