<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    protected function index()
    {
        return \View::make('auth.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'id_rol' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'id_rol' => $data['id_rol']
        ]);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {

        $rules = array(
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'id_rol' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

            $error = $validator->errors()->first();
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content',  $error);
            return redirect('register');

        }else{

            $user = new User; // Creando el objecto del modelo
            $user->name= $request->input("name");
            $user->email=$request->input("email");
            $user->password= bcrypt($request->input("password"));
            $user->id_rol= $request->input("id_rol");
            $user -> save();
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Record saved successfully!');
            return redirect()->route('register');
        }

    }

    public function destroy(Request $request,$id){
        $user = User::find($id);
        $user -> delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Record deleted successfully!');
        return redirect()->route('user_list');
    }
}
