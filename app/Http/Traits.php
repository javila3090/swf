<?php
namespace App\Http\Traits;

use Aloha\Twilio\Twilio;
use App\Order;
use App\Fact;

trait Traits {
    /**
     * @param $to
     * @param $message
     */
    public function _sendSms($to, $message)
    {
        $accountSid = env('TWILIO_ACCOUNT_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = env('TWILIO_NUMBER');

        $client = new Twilio($accountSid, $authToken, $twilioNumber);

        try {
            $client->message(
                $to,
                [
                    "body" => $message,
                    "from" => $twilioNumber
                    //   On US phone numbers, you could send an image as well!
                    //  'mediaUrl' => $imageUrl
                ]
            );
            //Log::info('Message sent to ' . $twilioNumber);
        } catch (TwilioException $e) {
            dd($e);
            /*Log::error(
                'Could not send SMS notification.' .
                ' Twilio replied with: ' . $e
            );*/
        }
    }
}