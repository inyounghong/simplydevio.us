<?php
session_start();
require_once('deviantAPI.php');
use \DeviantAPI as api;

$options = array(
    "client_id" => '4082',
	"client_secret" => '049014ae5d6c334d27ffd89a96f8e4fc',
	"redirect_uri" => 'http://localhost:8888/scripts/deviantAPI/test.php',
	"scope" => 'user browse'
);

$client = new api\DeviantAPI($options);
$refresh = true;

if (!$refresh && isset($_SESSION['username']) && isset($_SESSION['access_token']) && isset($_SESSION['refresh_token'])) {
    $client->setTokens($_SESSION["access_token"], $_SESSION["refresh_token"]);

} else {
    $client->authenticate();
    $client->isAuthenticated();
    $user_info = $client->whoAmI();
    // echo $user_info["username"];
    $_SESSION["username"] = $user_info["username"];
    $_SESSION["access_token"] = $client->getAccessToken();
    $_SESSION["refresh_token"] = $client->getRefreshToken();

}

echo "<p>Hello " . $_SESSION['username'] . "<p>";

// Get friends
$simplified_watchers = [];

$watchers = $client->getWatchers(0);
$offset = 50;
while ($watchers['has_more'] && $offset <= 50) {
    echo "Fetched for offset $offset <br>";
    $simplified = simplifyWatchers($watchers['results']);
    $simplified_watchers = array_merge($simplified_watchers, $simplified);
    $watchers = $client->getWatchers($offset);
    $offset += 50;
}

// Convert all to json and write
writeJson(json_encode($simplified_watchers), "watchers.json");

// $hasMore = $results['has_more'];
// $watchers = simplifyWatchers($results['results']);
// printWatchers($watchers);

function writeJson($json, $filename) {
    $myfile = fopen($filename, "w") or die("Unable to open file!");
    fwrite($myfile, $json);
    fclose($myfile);
}

// simplifies watchers
function simplifyWatchers($watchers) {
    $arr = [];
    foreach ($watchers as $watcher) {
        $user = array();
        $user['username'] = $watcher['user']['username'];
        $user['type'] = $watcher['user']['type'];
        $user['age'] = $watcher['user']['details']['age'];
        $user['sex'] = $watcher['user']['details']['sex'];
        $user['country'] = $watcher['user']['geo']['country'];
        $user['countryId'] = $watcher['user']['geo']['countryId'];
        $user['timezone'] = $watcher['user']['geo']['timezone'];
        $user['artistLevel'] = $watcher['user']['profile']['artist_level'];
        $user['artistSpeciality'] = $watcher['user']['profile']['artist_speciality'];
        $user['isWatching'] = $watcher['is_watching'];
        $user['lastVisit'] = $watcher['lastvisit'];
        $user['joinDate'] = $watcher['user']['details']['joindate'];
        array_push($arr, $user);
     }
     return $arr;
}

function printWatchers($watchers) {
    foreach ($watchers as $watcher) {
        echo '<p>' . $watcher['username'] . '<br>';
        echo $watcher['type'] . '<br>';
        echo print_r($watcher['details']) . '<br>';
        echo print_r($watcher['geo']) . '<br>';
        echo $watcher['artist_level'] . '<br>';
        echo $watcher['artist_speciality'] . '<br>';
        echo $watcher['is_watching'] . '<br>';
        echo $watcher['last_visit'] . '</p>';
    }
}


// echo $access_token;

?>
