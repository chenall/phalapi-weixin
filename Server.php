<?php
namespace Phalapi\WeiXin;

/**
 * 接收信息处理,自行根据不同消息类型进行扩展处理。
 * 
 */
class Server {
    /**
     * 接收到文本信息的处理
     *
     * @param msg\text $msg
     * @return mixed
     */
    public function text($msg){
        return '接收到'.__FUNCTION__;
    }

    /**
     * 位置信息
     * @param msg\location $message 
     * @return mixed 
     */
    public function location($message){
        return '接收到'.__FUNCTION__;
    }

    /**
     * 事件推道
     * @param msg\event $message 
     * @return mixed 
     */
    public function event($message){
        return '接收到'.__FUNCTION__;
    }

    /**
     * 图片消息
     * @param msg\image $message 
     * @return mixed 
     */
    public function image($message){
        return '接收到'.__FUNCTION__;
    }

    /**
     * 语音消息
     * @param msg\voide $message 
     * @return mixed 
     */
    public function voice($message){
        return '接收到'.__FUNCTION__;
    }
    /**
     * 视频消息
     * @param msg\video $message 
     * @return mixed 
     */
    public function video($message){
        return '接收到'.__FUNCTION__;
    }
    
    /**
     * 其它未定义信息
     * @return mixed 
     */
    function __call($func,$param){
        return '接收到：'.$func;
    }
}