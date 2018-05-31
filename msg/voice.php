<?php
namespace PhalApi\WeiXin\msg;

class voice extends msg{
    /**
     * 
     * @var string 音格式，如amr，speex等
     */
    public $Format;
    /**
     * 
     * @var string 媒体文件id，可以调用获取媒体文件接口拉取数据，仅三天内有效
     */
    public $MediaId;
}