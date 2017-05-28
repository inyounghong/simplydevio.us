<?php
// header("Content-Type: application/json");
// echo $_GET['callback'] . '({code: "' . $_GET["code"] . '"})';

$code = $_GET['code'];
$clientSecret = "049014ae5d6c334d27ffd89a96f8e4fc";
$redirectUrl = "http://localhost:8888/scripts/authorize.php";
// $url = "https://www.deviantart.com/oauth2/token?grant_type=authorization_code&client_id=4082&client_secret=$clientSecret&redirect_uri=$redirectUrl&code=" . $code;
// $url = "https://www.deviantart.com/oauth2/authorize?response_type=code&client_id=4082&redirect_uri=http://www.simplydevio.us/scripts/authorize.php&scope=browse&state=mysessionid";
// echo file_get_contents($url);
//

$username = "simplysilent";
$token = "13a5ef8b6225d642f2de44e6a0d739914f5ee7f1f8775c1e79";
$url = "https://www.deviantart.com/api/v1/oauth2/user/watchers/$username?access_token=$token";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
$result = curl_exec ($ch);
curl_close ($ch);
echo $result;
?>
