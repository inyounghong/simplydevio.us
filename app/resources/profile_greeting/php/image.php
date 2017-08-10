<?php

include("simple_html_dom.php");
// echo phpversion();
// echo phpinfo();
// echo "hi" + ;
$username = "simplysilent";
$visitor = "visitor";
$html = curl_get_contents("https://simplysilent.deviantart.com");

echo $html;

function curl_get_contents($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, 'UA');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

?>
