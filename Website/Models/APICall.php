<?php

/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29/10/2016
 * Time: 18:45
 */
class APICall
{
    private $_d;
    private $_db = null;
    private $opt = array();

    //Constructs the Check Class. Used to check that a form can be submitted. Is correct.
    public function __construct() {
        $this->_db = DB::getInstance();
        $this->_d = new DateTime();
        $this->_d->setTimezone( new DateTimeZone("Europe/London"));
        array_push($this->opt, 2002, 2006, 6000, 1621, 1402, 1800, 2201, 1412, 2306, 2510);
    }

    public function printOption($option){
       echo 'channel name: ' . $option->getChannelTitle() . '<br/>';
       echo 'program name: ' . $option->getShowTitle() . '<br/>';
       echo 'program desc: ' . $option->getDesc() . '<br/>';
       echo 'channel number: ' . $option->getChannelNumber() . '<br/>';
    }

    public function getOptions(){
    $rand = $this->UniqueRandomNumbersWithinRange(0, 9, 4);

        foreach ($rand as $option) {
            $this->getChannelInfo($this->opt[$option]);
        }
    }

    public function addToDB($option){
        $this->_db->insertSQL("INSERT INTO options (channelTitle, showTitle, shortDesc, channelNumber) VALUES ('" . $option->getChannelTitle() . "','" . $option->getShowTitle() . "','" .$option->getDesc() . "','" .$option->getChannelNumber()."')");
    }

    public function getChannelInfo($channelCode){
        ini_set("allow_url_fopen", 1);
<<<<<<< HEAD
        $json = file_get_contents("http://epgservices.sky.com/tvlistings-proxy/TVListingsProxy/tvlistings.json?channels=".$channelCode."&time=". $this->_d->format('YmdHi')."&dur=10&detail=2&siteId=1");
        $obj = json_decode($json);    
        
        //$obj->channels->program->title;
        
=======
        $json = file_get_contents("http://epgservices.sky.com/tvlistings-proxy/TVListingsProxy/tvlistings.json?channels=".$channelCode."&time=". $this->_d->format('Ymd')."0000&dur=10&detail=2&siteId=1");
        $obj = json_decode($json);
        $option = new Options($obj->channels->program[0]->title, $obj->channels->title, $obj->channels->program[0]->shortDesc, $channelCode );
        $this->addToDB($option);
    }

    public function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }

    public function initialiseArray(){

>>>>>>> master
    }
}
