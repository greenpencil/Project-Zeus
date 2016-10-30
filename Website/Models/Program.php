<?php

require_once("DatabaseCalls.php");

/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29/10/2016
 * Time: 18:52
 */
class Program
{
    private $_showTitle;
    private $_image;
    private $desc;
    private $channel;
    private $dbcalls;

    /**
     * Option constructor.
     * @param $_showTitle
     * @param $_channelTitle
     * @param $_channelNumber
     * @param $_image
     * @param $desc
     * @param $channelCode
     */
    public function __construct($_showTitle, $_image, $desc, $channelId)
    {
        $this->_showTitle = $_showTitle;
        $this->_image = $_image;
        $this->desc = $desc;
        $this->dbcalls = new DatabaseCalls();
        $this->channel = $this->dbcalls->getChannelById($channelId);
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
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param mixed $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }
}