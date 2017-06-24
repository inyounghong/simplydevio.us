<?php

namespace DeviantAPI;

class DeviantAPI {

    private $client_id;
    private $client_secret;
    private $redirect_uri;
    private $scope;
    private $user_agent;
    private $access_token;
    private $refresh_token;

    private $authorization_endpoint = 'https://www.deviantart.com/oauth2/authorize';
    private $token_endpoint = 'https://www.deviantart.com/oauth2/token';
    private $placebo_endpoint = "https://www.deviantart.com/api/v1/oauth2/placebo";

    function __construct($params=array()) {
        $this->client_id = $params["client_id"];
        $this->client_secret = $params["client_secret"];
        $this->redirect_uri = $params["redirect_uri"];
        $this->scope = $params["scope"];
        $this->user_agent = $_SERVER["HTTP_USER_AGENT"];
    }

    function getAccessToken() {
        return $this->access_token;
    }
    function getRefreshToken() {
        return $this->refresh_token;
    }

    function setTokens($access_token, $refresh_token) {
        $this->access_token = $access_token;
        $this->refresh_token = $refresh_token;
    }


    function authenticate() {
        if (!empty($_GET['code'])) {
            $code = $_GET['code'];
            $this->authenticateTokens($code);
        } else {
            $params = array(
                'client_id' => $this->client_id,
                'redirect_uri' => $this->redirect_uri,
                'response_type' => 'code',
                'scope' => $this->scope,
            );
            header('Location: ' . $this->authorization_endpoint . '?' . http_build_query($params));
            die('Redirecting...');
        }
    }

    function isAuthenticated() {
        try {
            if (empty($this->access_token)) throw new \Exception("The access_token is empty.");
            if (empty($this->refresh_token)) throw new \Exception("The refresh_token is empty.");
            $data = array();
            $data["access_token"] = $this->access_token;
            $result = json_decode($this->doCurl($this->placebo_endpoint, $data), true);
            return ($result["status"] == "success")?true:false;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }


    function refreshToken() {
        try {
            if (empty($this->refresh_token)) {
                throw new \Exception("The refresh_token is empty.");
            }
            $data = array();
            $data["grant_type"] = "refresh_token";
            $data["client_id"] = $this->client_id;
            $data["client_secret"] = $this->client_secret;
            $data["refresh_token"] = $this->refresh_token;
            $result = json_decode($this->doCurl($this->token_endpoint, $data), true);

            if (!empty($result["error"])) {
                throw new \Exception($result["error_description"]);
            }
            $this->setTokens($result["access_token"], $result["refresh_token"]);

        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    function authenticateTokens($code) {
        $data = array();
        $data["grant_type"] = "authorization_code";
        $data["client_id"] = $this->client_id;
        $data["client_secret"] = $this->client_secret;
        $data["redirect_uri"] = $this->redirect_uri;
        $data["code"] = $code;
        try {
            $result = json_decode($this->doCurl($this->token_endpoint, $data), true);
            if (!empty($result["error"])) throw new \Exception($result["error_description"]);
            $this->access_token = $result["access_token"];
            $this->refresh_token = $result["refresh_token"];
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    function whoAmI() {
        if (!$this->isAuthenticated()) {
            $this->refreshToken();
        }
        $data = array(
            'access_token' => $this->access_token,
        );
        $url = 'https://www.deviantart.com/api/v1/oauth2/user/whoami';
        $result = json_decode($this->doCurl($url, $data), true);
        return $result;
    }

    function getWatchers($offset) {
        if (!$this->isAuthenticated()) {
            $this->refreshToken();
        }
        $data = array(
            'offset' => $offset,
            'limit' => 50,
            'access_token' => $this->access_token,
            'expand' => 'user.details,user.geo,user.profile',
        );
        $url = 'https://www.deviantart.com/api/v1/oauth2/user/watchers';
        $result = json_decode($this->doCurl($url, $data), true);
        return $result;
    }

    private function doCurl($url, $data = array()) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}




// $access_token = authenticate();
// $user_info = getWhoAmI($access_token);
// print_r($user_info["username"]);









?>
