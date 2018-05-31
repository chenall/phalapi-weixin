<?php
namespace PhalApi\WeiXin\msg;

/**
  * 文本消息
 */
class text extends msg{
    /**
     * 
     * @var string 消息类类型,固定text
     */
    public $MsgType;
    /**
     * 
     * @var string 文本消息内容
     */
    public $Content;
}