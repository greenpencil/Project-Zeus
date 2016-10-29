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
    private $_Options = array();

    //Constructs the Check Class. Used to check that a form can be submitted. Is correct.
    public function __construct() {
        $this->_db = DB::getInstance();
        $this->_d = new DateTime();
        $this->_d->setTimezone( new DateTimeZone("Europe/London"));
    }
//
//    public function _generateOptions(){
//       $Obj1 = new Option($_showTitle, $_channelTitle, $_channelNumber, $_image, $desc, $channelCode);
//    }

    public function getOptions(){rand(1,10);
        //$this->getChannelInfo();
        $this->getChannelInfo(2006);
        $this->getChannelInfo(6000);
        $this->getChannelInfo(1621);
        $this->getChannelInfo(1402);

    }

    public function getChannelInfo($channelCode){
        ini_set("allow_url_fopen", 1);
        $json = file_get_contents("http://epgservices.sky.com/tvlistings-proxy/TVListingsProxy/tvlistings.json?channels=".$channelCode."&time=". $this->_d->format('YmdHi')."&dur=10&detail=2&siteId=1");
        $obj = json_decode($json);
        //echo "http://epgservices.sky.com/tvlistings-proxy/TVListingsProxy/tvlistings.json?channels=".$channelCode."&time=". $this->_d->format('YmdHi')."&dur=10&detail=2&siteId=1";
        //var_dump($json);
        //$obj->channels->program->title;
        
    }
}