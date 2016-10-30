<?php
require_once ("DB.php");
/**
 * Created by PhpStorm.
 * User: Katie
 * Date: 30/10/2016
 * Time: 01:00
 */
class DatabaseCalls
{
    private $_db;

    /**
     * DatabaseCalls constructor.
     * @param $_db
     */
    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function getChannelById($channelid)
    {
        $this->_db->query("SELECT * FROM channels WHERE id=".$channelid);
        $return = $this->_db->getFirst();
        return new Channel($return->id, $return->title,$return->number,$return->code);
    }

    public function getProgramById($programid)
    {
        $this->_db->query("SELECT * FROM programs WHERE id= ".$programid);
        $return = $this->_db->getFirst();
        $name = $return->name;
        $img = $return->image;
        $sd = $return->short_desc;
        $ch = $return->channel_id;
        return new Program($return->id,$name, $img, $sd, $ch);
    }


    public function getCurrentBlockId()
    {
        $this->_db->query("SELECT * FROM settings WHERE name='current_block_id'");
        $return = $this->_db->getFirst();
        return $return->value;
    }

    public function updateBlockId($newId)
    {
        $updateq = "UPDATE settings SET value='".$newId."' WHERE name='current_block_id'";
        $this->_db->query($updateq);
    }

    public function checkIfHourPast($oldtime, $currenttime)
    {

    }

    public function getListOfChannelsInBlock($blockid)
    {
        $this->_db->query("SELECT channel_id FROM blocks_channels WHERE block_id=".$blockid."");
        $return = $this->_db->getResults();
        $channels = array();
        foreach ($return as $channel)
        {
            array_push($channels, $this->getChannelById($channel->channel_id));
        }

        return $channels;
    }

    public function getPrograms($channel_id, $block_id)
    {
        $this->_db->query("SELECT * FROM programs WHERE channel_id= ".$channel_id." AND block_id = ".$block_id);
        $return = $this->_db->getFirst();
        $name = $return->name;
        $img = $return->image;
        $sd = $return->short_desc;
        $ch = $return->channel_id;
        return new Program($return->id, $name, $img, $sd, $ch);
    }
    public function getLastVote()
    {
        $this->_db->query("SELECT * FROM settings WHERE name='last_program_vote'");
        $result = $this->_db->getFirst();
        return $this->getProgramById($result->value);
    }

    public function setWinner($winner_id)
    {
        $updateq = "UPDATE settings SET value='".$winner_id."' WHERE name='last_program_vote'";
        $this->_db->query($updateq);
    }
}