<?php

class Osu {
    private $token;
    private $baseURL = "https://osu.ppy.sh/api/";

    function __construct($token) {
        $this->token = $token;
    }

    public function get_user($username) {
        return $this->get_json("get_user?k=" . $token . "&u=" . $username);
    }

    private function get_json($url) {
        ini_set("allow_url_fopen", 1);
        $json = json_decode(file_get_contents($baseURL . $url), true);
        ini_set("allow_url_fopen", 0);

        return $json;
    }

    public function set_token($token) {
        $this->token = $token;
    }

    public function get_token() {
        return $token;
    }
}

?>