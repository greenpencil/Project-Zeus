<?php
require_once("APICall.php");
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
    public $programs = array();

    /**
     * SetUp constructor.
     */
    public function __construct()
    {
        $this->apiCall = new APICall();
    }
    //make block
    //generate channels
    //load data for channels
    // display channels



    public function makeblock(){
        
    }

    public function generateChannels(){
        $nums = $this->UniqueRandomNumbersWithinRange(1,9, 4);
        foreach ($nums as $num)
        {
            array_push($this->programs, $this->apiCall->addProgramToDB($num));
        }
    }

    public function getListOfPrograms(){
        foreach ($this->programs as $program)
        {
            //$program.setChannel(getChannelById($channel))
        }

        return $this->programs;
    }
    
    public function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
}