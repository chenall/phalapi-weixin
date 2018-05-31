<?php
namespace PhalApi\WeiXin\msg;

class image extends msg{
    /**
     * 
     * @var string 图片链接(image)
     */
    public $PicUrl;
    /**
     * 
     * @var string 媒体文件id，可以调用获取媒体文件接口拉取数据，仅三天内有效
     */
    public $MediaId;
}