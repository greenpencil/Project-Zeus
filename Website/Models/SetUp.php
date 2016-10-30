<?php
require_once("APICall.php");
require_once ("DatabaseCalls.php");
/**
 * Created by PhpStorm.
 * User: Katie
 * Date: 30/10/2016
 * Time: 01:57
 */
class SetUp
{
    public $apiCall;
    public $databaseCalls;
    public static $programs = array();
    public $_db;

    /**
     * SetUp constructor.
     */
    public function __construct()
    {
        $this->apiCall = new APICall();
        $this->databaseCalls = new DatabaseCalls();
        $this->_db = DB::getInstance();
    }
    //make block
    //generate channels
    //load data for channels
    // display channels



    public function makeblock(){
        $curentBlock = $this->databaseCalls->getCurrentBlockId();
        $nextBlock = $curentBlock+1;
        $this->databaseCalls->updateBlockId($nextBlock);
        $d = new DateTime();
        $d->setTimezone( new DateTimeZone("Europe/London"));

        $currentTime = $d->format("Ydmhi");
        //$currentTime = "201610301030";
        $this->_db->insertSQL("INSERT INTO blocks (id,start, length) VALUES ('".$nextBlock."','".$currentTime."','1')");
    }

    public function generateChannels(){
        $nums = $this->UniqueRandomNumbersWithinRange(2,10, 4);
        foreach ($nums as $num)
        {
            $this->apiCall->addProgramToDB($num);
            $blockid = $this->databaseCalls->getCurrentBlockId();
            $this->_db->query("INSERT INTO blocks_channels (block_id, channel_id) VALUES('.$blockid.', '".$num."')");
            //array_push(self::$programs, );
        }
    }
    
    public function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
}