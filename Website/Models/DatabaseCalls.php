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
    public function __construct($_db)
    {
        $this->_db = DB::getInstance();
    }

    public function getChannelFromDB($channelid)
    {
        $channelArray = new Option();

    }


    public function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
}