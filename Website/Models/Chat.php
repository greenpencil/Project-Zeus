<?php
class Chat
{
    private $db = null;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function addChat($userid, $message){
        $this->db->insertSQL("INSERT INTO chat (user_id, message, time_sent) VALUES ('" . $userid . "','" . $message . "','" . date('Y-m-d H:i:s') . "')");
    }

    public function getChatDesc(){
        $data = $this->db->query('SELECT * FROM chat ORDER BY id DESC');
        $results = $data->getResults();
        return $results;
    }
}