<?php
namespace PhalApi\WeiXin\msg;

class event extends msg{
    /**
     * 
     * @var string  事件类型，subscribe(关注)、unsubscribe(取消关注) 
     */
    public $Event;
    /**
     * 
     * @var string 事件KEY值，此事件该值为空 
     */
    public $EventKey; 
}