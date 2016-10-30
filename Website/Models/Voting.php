<?php

/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29/10/2016
 * Time: 23:56
 */
class Voting
{
    private $db = null;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function addVote($blockid, $channelid, $userid){
        $this->db->insertSQL("INSERT INTO votes (block_id, channel_id, user_id) VALUES ('" . $blockid . "','" . $channelid . "','" . $userid . "')");
    }

    public function getUserVotes($fUserid){
        $getVoteNum =  $this->db->query('SELECT * FROM vote WHERE USER_ID = ' . $fUserid);
    }

    public function getVotes($fUserid){
        $getVotes =  $this->db->query('SELECT $blockid FROM vote');
    }

    public function calcPercentage($blockid, $channelid){
        $this->db->query('SELECT * FROM votes WHERE block_id='.$blockid);
        $total =  $this->db->getCount();
        $this->db->query('SELECT * FROM votes WHERE block_id='.$blockid.' AND channel_id='.$channelid);
        $options =  $this->db->getCount();

        return ($options / $total) * 100;
    }

    function getVoteNum($fUserid)
    {
        $getVoteNum =  $this->db->query('SELECT * FROM vote WHERE USER_ID = ' . $fUserid);
        $getVoteNum->execute();
        return $getVoteNum->rowCount();
    }
}