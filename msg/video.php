<?php
namespace PhalApi\WeiXin\msg;

/**
 * 视频消息
 */
class video extends msg{
    /**
     * 
     * @var string 媒体文件id，可以调用获取媒体文件接口拉取数据，仅三天内有效
     */
    public $MediaId;
    /**
     * 
     * @var string 视频消息缩略图的媒体id，可以调用获取媒体文件接口拉取数据，仅三天内有效
     */
    public $ThumbMediaId;
}