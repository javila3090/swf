<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 11/10/2017
 * Time: 03:19 PM
 */

return array(
    /** set your paypal credential **/
    'client_id' =>'AUZ6KYC-BIIfuE6YjrfyBI2BNa29JC2EnlP-dDsT-CQFsa9l7ptVdk9j9qb0KkwWPKdx6IzloBG48-Zr',
    'secret' => 'ENjpabjI07yQduYf444Gv9Ao4GSumJ-aF4-5JLWVvnOFajIom1YRIqgmD9a1UrmcAAA9rrNVSX9Zr65Q',
    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 1000,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);