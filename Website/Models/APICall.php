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
        $this->_d->setTimezone( new DateTimeZone("Europe/Paris"));
        array_push($this->opt, 2002, 2006, 6000, 1621, 1402, 1800, 2201, 1412, 2306, 2510);
    }

    public function printOption($option){
       echo 'channel name: ' . $option->getChannelTitle() . '<br/>';
       echo 'program name: ' . $option->getShowTitle() . '<br/>';
       echo 'program desc: ' . $option->getDesc() . '<br/>';
       echo 'channel number: ' . $option->getChannelNumber() . '<br/>';
    }
    
    public function addToDB($option)
    {
        $newShowTitle = $this->_db->getPDO()->quote($option->getShowTitle());
        $newShortDest = $this->_db->getPDO()->quote($option->getDesc());
        $newBlock = (new DatabaseCalls())->getCurrentBlockId();
        //echo "INSERT INTO programs (name, short_desc, channel_id) VALUES (" . $newShowTitle . "," .$newShortDest. ",'" .$option->getChannel()."')";
        $this->_db->insertSQL("INSERT INTO programs (name, short_desc, channel_id, block_id) VALUES (" . $newShowTitle . "," . $newShortDest . ",'" . $option->getChannel()->getId() . "', '".$newBlock."')");
    }

    public function addProgramToDB($channelid){
        ini_set("allow_url_fopen", 1);
        $this->_db->query("SELECT code FROM channels WHERE id=".$channelid);
        $channelCode = $this->_db->getFirst()->code;
        //echo "SELECT code FROM channels WHERE id=".$channelid;
        //var_dump($channelCode);
            //echo "http://epgservices.sky.com/tvlistings-proxy/TVListingsProxy/tvlistings.json?channels=".$channelCode."&time=". $this->_d->format('Ymd')."0000&dur=10&detail=2&siteId=1";
        $time = $this->_d->format('Ymdhi');
        $json = file_get_contents("http://epgservices.sky.com/tvlistings-proxy/TVListingsProxy/tvlistings.json?channels=".$channelCode."&time=". $time."&dur=10&detail=2&siteId=1");
        $obj = json_decode($json);
        //echo '<pre>';
        //var_dump($obj->channels);
        //echo '</pre>';
        //$this->_db->query("SELECT id FROM channels WHERE code=".$channelCode);
        //$res = $this->_db->getFirst()->id;
        if(isset($obj->channels->program)
)        {
            //var_dump($obj->channels->program);
            if(is_object($obj->channels->program))
            {
                $option = new Program(null,$obj->channels->program->title, null, $obj->channels->program->shortDesc, $channelid );

            } else {
                $option = new Program(null,$obj->channels->program[0]->title, null, $obj->channels->program[0]->shortDesc, $channelid);
            }
            $this->addToDB($option);
        }
        else {
            // hacky approach to the api sometimes not returning a channel
            // come dine with me is probably on anyway
            $option = new Program(null, "Come Dine with me", null, "In Chester, four cooks compete to win the £1000 prize as they go head-to-head, pulling out all the stops to impress, including an evening of French sophistication from Emma.", 4);
        }
        return $option;
    }


    public function initialiseArray(){
        
    }
}
