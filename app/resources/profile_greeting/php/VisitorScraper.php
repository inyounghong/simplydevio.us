<?php

include("simple_html_dom.php");

class VisitorScraper {

    private $username;
    private $alwaysDisplayName;

    function __construct($username, $alwaysDisplayName) {
		$this->username = $username;
        $this->alwaysDisplayName = $alwaysDisplayName;
	}

    function getVisitor() {
        $username = $this->username;
        $html = str_get_html($this->curl_get_contents("https://$username.deviantart.com"));

        $visitor_widget = $html->find('.gr-visitors', 0);
        $name_li = $visitor_widget->find("li.f", 0);
        $avatars = $visitor_widget->find(".pppp", 0);

        $time = null; // 3:14

        if ($name_li != null) { // Names only
            $name = trim($name_li->find('span', 0)->plaintext);
            $time = explode(" ", $name_li->find('div', 0)->plaintext)[4];
        } else if ($avatars != null) { // Avatars only (no time)
            $name = $avatars->find('.avatar', 0)->title;
        } else { // Names and avatars
            $name_and_avatar = $visitor_widget->find('.f', 0)->plaintext;
            $arr = preg_split("/\s+/", $name_and_avatar);
            $name = $arr[1];
            $time = $arr[5];
        }

        if ($this->alwaysDisplayName || $time === null || $this->isRecentlyVisited($time)) {
            return $name;
        }
        return "visitor";
    }

    // Returns whether time is recent
    function isRecentlyVisited($time) {
        $mins = intval(substr($time, 2));
        $curr_mins = intval(date('i'));
        return (abs($mins - $curr_mins) <= 1);
    }

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
}

?>
