<?php


 function  send_sms($client_id,$api_key,$sender_id,$message,$rec_contact_no){
                           
    $curl = curl_init();

      
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://send.ozonedesk.com/api/v2/send.php/?
        user_id=$client_id&api_key=$api_key&sender_id=$sender_id&message=$message&recipient_contact_no=$rec_contact_no",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));
      

    $response = curl_exec($curl);
    
    curl_close($curl);
    echo  $response;    
                    
    }
                  
    //set variables
               
    $client_id             =  "102612";                                       // Replace your client ID
    $campaign_name         =  "Test";                                         // Replace your client ID
    $api_key               =  "sx7hm7cpuk02bxrhs";                                     // Replace your api key
    $sender_id             =  "Vaipavam";                                   // Replace your sender id
    $message               =  "Hello";                                        // Message
    $rec_contact_no    =  "94779637977";      // Recipient contact no

    // call send_sms function
                    
    send_sms($client_id,$api_key,$sender_id,$message,$rec_contact_no);