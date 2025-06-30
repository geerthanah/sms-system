<?php


$apiKey = 'sx7hm7cpuk02bxrhs';
$userID = '102612';
$senderId = 'Vaipavam';
$rec_contact='0779637977';

if (!empty($apiKey) || !empty($userID) || !empty($senderId)) {

    $ch = curl_init();

    $message = "Merry Christmas and Happy New Year
    இனிய கிறிஸ்துமஸ் மற்றும் புத்தாண்டு வாழ்த்துக்கள் https://digitalyazhi.com/";
    $str =iconv("UTF-8", "ASCII", $message), PHP_EOL;
  // $str= htmlspecialchars( $message, ENT_NOQUOTES, "UTF-8");
    curl_setopt($ch, CURLOPT_URL, "http://send.ozonedesk.com/api/v2/send.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,"user_id=".$userID."&api_key=".$apiKey."&sender_id=".$senderId."&to=".$rec_contact."&message=".$str);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close($ch);
    echo  $server_output;    
}
?>