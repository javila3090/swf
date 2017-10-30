<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Traits\Traits;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SendSmsOneHour extends Command
{
    use Traits;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:smsOneHour';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send one sms per hour';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $orders=DB::table('orders')->where('id_frecuency',1)->where('id_status',1)->get();
        $randomFact = DB::table('facts')
            ->inRandomOrder()
            ->first();

        foreach ($orders as $order){
            $facts_sent_count=DB::table('facts_sent')->where('id_order',$order->id)->count();
            if($facts_sent_count<$order->quantity) {
                $this->_sendSms($order->phone_number, $randomFact->text);
                $now = Carbon::now();
                $register = DB::table('facts_sent')->insert(['id_order' => $order->id, 'id_fact' => $randomFact->id, 'created_at' => $now]);
                if (!$register) {
                    return $this->error('Error!');
                }
            }else{
                DB::table('orders')
                    ->where('id', $order->id)
                    ->update(['id_status' => 2]);
            }
        }
        $this->info('send:smsOneHour Command Run successfully!');
    }
}