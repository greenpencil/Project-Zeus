<?php

/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29/10/2016
 * Time: 23:56
 */
class Voting
{
    private $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function addVote($blockid, $channelid, $userid){
        $this->_db->insertSQL("INSERT INTO votes (block_id, channel_id, user_id) VALUES ("." $blockid "." $channelid "." $userid )");
    }

    public function getUserVotes($fUserid){
        $getVoteNum =  $this->db->prepare('SELECT * FROM vote WHERE USER_ID = ' . $fUserid);
    }

    public function getVotes($fUserid){
        $getVotes =  $this->db->prepare('SELECT $blockid FROM vote');
    }

    public function calcPercentage(){
        $get1 =  $this->db->prepare('SELECT COUNT $blockid FROM vote');
        $get2 =  $this->db->prepare('SELECT $blockid FROM vote');
        $get3 =  $this->db->prepare('SELECT $blockid FROM vote');
        $get4 =  $this->db->prepare('SELECT $blockid FROM vote');
    }

    function getVoteNum($fUserid)
    {
        $getVoteNum =  $this->db->prepare('SELECT * FROM vote WHERE USER_ID = ' . $fUserid);
        $getVoteNum->execute();
        return $getVoteNum->rowCount();
    }
}