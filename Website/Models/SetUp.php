<?php

/**
 * Created by PhpStorm.
 * User: Katie
 * Date: 30/10/2016
 * Time: 01:57
 */
class SetUp
{
    //make block
    //generate channels
    //load data for channels
    // display channels

    public function makeblock(){
        
    }
    
    public function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
}