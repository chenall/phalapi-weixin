<?php
namespace PhalApi\WeiXin\msg;

class msg{
    /**
     * 
     * @var string 企业微信CorpID 
     */
    public $ToUserName;
    /**
     * 
     * @var string 成员UserID 
     */
    public $FromUserName;
    /**
     * 
     * @var int 消息创建时间（整型）
     */
    public $CreateTime;
    /**
     * 
     * @var string 消息类类型(text,image,voice,video,location,link)
     */
    public $MsgType;
    /**
     * 
     * @var int 消息id，64位整型
     */
    public $MsgId;
    /**
     * 
     * @var string 企业应用的id，整型。
     */
    public $AgentID;
}