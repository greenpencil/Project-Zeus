<?php

/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29/10/2016
 * Time: 20:14
 */
class Channel
{
    private $_id;
    private $_name;
    private $_number;
    private $_code;

    /**
     * Channel constructor.
     * @param $_id
     * @param $_name
     * @param $_number
     * @param $_code
     */
    public function __construct($_id, $_name, $_number, $_code)
    {
        $this->_id = $_id;
        $this->_name = $_name;
        $this->_number = $_number;
        $this->_code = $_code;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->_number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->_number = $number;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->_code = $code;
    }

    

}