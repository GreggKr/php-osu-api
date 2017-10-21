<?php

class Osu {
    private $token;


    function __construct($token) {
        $this->token = $token;
    }

    public function get_beatmap($id, $mode = 0) {
        global $token;

        return $this->get_json("/get_beatmaps?k=" . $this->token . "&b=" . $id . "&m=" . $mode)[0];
    }

    public function get_user($username, $mode = 0) {
        global $token;

        return $this->get_json("/get_user?k=" . $this->token . "&u=" . $username . "&m=" . $mode)[0];
    }

    public function get_scores($id, $limit = 50, $mode = 0) {
        global $token;

        return $this->get_json("/get_scores?k=" . $this->token . "&b=" . $id . "&m=" . $mode . "&m=" . $mode);
    }

    public function get_user_best($id, $limit = 10, $mode = 0) {
        global $token;
        
        return $this->get_json("/get_user_best?k=" . $this->token . "&limit=" . $limit . "&mode=" . $mode);
    }

    public function get_user_recent($userID, $limit = 10, $mode = 0) {
        global $token;
        
        return $this->get_json("/get_user_recent?k=" . $token . "&limit=" . $limit . "&m=" . $mode);
    }


    public function get_match($matchID) {
        global $token;

        return $this->get_json("/get_match?k=" . $token . "&mp=" . $matchID)[0];
    }

    public function get_replay($id, $userID, $mode = 0) {
        global $token;

        return $this->get_json("/get_replay?k=" . $token , "&u=" . $userID . "&m=" . $mode);
    }

    private function get_json($url) {
        ini_set("allow_url_fopen", 1);
        $json = json_decode(file_get_contents("https://osu.ppy.sh/api" . $url), true);
        ini_set("allow_url_fopen", 0);

        return $json;
    }

    public function set_token($token) {
        $this->token = $token;
    }

    public function get_token() {
        return $this->token;
    }
}