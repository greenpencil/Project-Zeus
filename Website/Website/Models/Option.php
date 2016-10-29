<?php

/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29/10/2016
 * Time: 18:52
 */
class Option
{
    private $_showTitle;
    private $_channelTitle;
    private $_channelNumber;
    private $_image;
    private $desc;
    private $channelCode;

    /**
     * Option constructor.
     * @param $_showTitle
     * @param $_channelTitle
     * @param $_channelNumber
     * @param $_image
     * @param $desc
     * @param $channelCode
     */
    public function __construct($_showTitle, $_channelTitle, $_channelNumber, $_image, $desc, $channelCode)
    {
        $this->_showTitle = $_showTitle;
        $this->_channelTitle = $_channelTitle;
        $this->_channelNumber = $_channelNumber;
        $this->_image = $_image;
        $this->desc = $desc;
        $this->channelCode = $channelCode;
    }

    /**
     * @return mixed
     */
    public function getShowTitle()
    {
        return $this->_showTitle;
    }

    /**
     * @param mixed $showTitle
     */
    public function setShowTitle($showTitle)
    {
        $this->_showTitle = $showTitle;
    }

    /**
     * @return mixed
     */
    public function getChannelTitle()
    {
        return $this->_channelTitle;
    }

    /**
     * @param mixed $channelTitle
     */
    public function setChannelTitle($channelTitle)
    {
        $this->_channelTitle = $channelTitle;
    }

    /**
     * @return mixed
     */
    public function getChannelNumber()
    {
        return $this->_channelNumber;
    }

    /**
     * @param mixed $channelNumber
     */
    public function setChannelNumber($channelNumber)
    {
        $this->_channelNumber = $channelNumber;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->_image = $image;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getChannelCode()
    {
        return $this->channelCode;
    }

    /**
     * @param mixed $channelCode
     */
    public function setChannelCode($channelCode)
    {
        $this->channelCode = $channelCode;
    }
}