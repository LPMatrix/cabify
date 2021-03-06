<?php
    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * 1. Save it as sendnotifications.php and at the command line, run 
     *         php sendnotifications.php
     *
     * 2. Upload it to a web host and load mywebhost.com/sendnotifications.php 
     *    in a web browser.
     *
     * 3. Download a local server like WAMP, MAMP or XAMPP. Point the web root 
     *    directory to the folder containing this file, and load 
     *    localhost:8888/sendnotifications.php in a web browser.
     */

    // Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php, 
    // following the instructions to install it with Composer.
    require_once __DIR__ . '/twilio-php-master/Twilio/autoload.php';

    use Twilio\Rest\Client;
    
    // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
    $AccountSid = "ACeb50602b771b5d2d3abcce7c7c4c8c29";
    $AuthToken =  "5dd10d64634cd739a8eebfae204d1b35";

    // Step 3: instantiate a new Twilio Rest Client
    $client = new Client($AccountSid, $AuthToken);

    // Step 4: make an array of people we know, to send them a message. 
    // Feel free to change/add your own phone number and name here.

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            "09063780937",

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+15017250604", 
                
                // the sms body
                'body' => "Trying out Twilio SMS api"
            )
        );

        // Display a confirmation message on the screen
        echo "Sent message to $name";
