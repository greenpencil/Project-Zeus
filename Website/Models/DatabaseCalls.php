<?php

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
        //return new Channel($this->_db->getFirst()->id, $this->);
    }

    
}