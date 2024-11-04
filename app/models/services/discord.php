<?php


class DiscordWebHook  {


    static public function sendTest() {

        
        $webhookurl = DISCORD_WEBHOOK_URL;

        $timestamp = date("c", strtotime("now"));

        $msg = [
            "content" => "Hello World, this is message line."
        ];

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $webhookurl);
        curl_setopt( $ch, CURLOPT_POST, true);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($msg));
        //curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        //curl_setopt( $ch, CURLOPT_HEADER, 0);

        $response = curl_exec( $ch );

        if(curl_errno($ch)){
            $err = curl_error($ch);
            echo 'error:<pre>'; print_r($err); echo '</pre>';
        }

        curl_close( $ch );
        
        // If you need to debug, or find out why you can't send message uncomment line below, and execute script.
        echo 'response:<pre>'; print_r($response); echo '</pre>'; die();

        return true;
    }
}