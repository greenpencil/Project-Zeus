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
}