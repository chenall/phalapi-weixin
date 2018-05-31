<?php
namespace PhalApi\WeiXin\msg;

/**
 * 位置消息
 */
class location extends msg{
    /** @var string  消息类型，此时固定为： location */
    public $MsgType;
    /**
     * 
     * @var string  地理位置纬度 
     */
    public $Location_X;
    /**
     * 
     * @var string 地理位置经度 
     */
    public $Location_Y;
    /**
     * 
     * @var string 地图缩放大小 
     */
    public $Scale;
    /**
     * 
     * @var string 地理位置信息
     */
    public $Label;
}