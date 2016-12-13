<?php

return [

    /**
     * The SMS service to use. twilio or plivo
     */
    'driver' => env('SMS_DRIVER','plivo'),

    /**
     * Plivo settings
     */
    'plivo' => [
        'token' => env('NmRiOTBiM2VjYzRkZWM3NTQwMjEzNDBiZjUxNmI1'),
        'user'  => env('MAYTM3ZDY3NMJJMZZLOT'),
        'from'  => env('PLIVO_FROM',null), //Default from phone number
    ], 

    /**
     * Twilio settings
     */
    'twilio' => [
        'token' => env('TWILIO_AUTH_TOKEN'),
        'user'  => env('TWILIO_AUTH_SID'),
        'from'  => env('TWILIO_FROM',null), //Default from phone number
    ], 
];
