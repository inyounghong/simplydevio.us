<?php

include("app/resources/profile_greeting/php/simple_html_dom.php");

function curl_get_contents($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, 'UA');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_ENCODING , "gzip");
    curl_setopt($ch, CURLOPT_ENCODING, '');
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$html = str_get_html(curl_get_contents("https://classes.cornell.edu/browse/roster/SP18/class/PE/1520"));
$class_section = $html->find('.heavy-left', 0);
if($class_section->find('.open-status-open', 0)) {
    mail('dmk254@cornell.edu', 'Archery class is open!', '');
}



?>
