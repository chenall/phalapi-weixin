<?php
namespace PhalApi\WeiXin;
use EasyWeChat\Factory;

/**
 * 微信扩展
 * @author chenall 20180525
 */
class Lite {
    private $Factory;
    public function __construct($Factory='') {
        $this->Factory=$Factory;
    }

    /**
     * 获取wxApp实例
     * @return \EasyWeChat\Kernel\ServiceContainer
     */
    public function wxApp(){
        $factory = current(explode('#',$this->Factory));
        $wxapp=Factory::$factory(\PhalApi\DI()->config->get('wx_'.$factory));
        return $wxapp;
    }
    /**
     * 服务端消息处理
     * @param string $Factory EasyWeChat Factory
     * @return mixed 
     */
    public function Server($ServerClass='') {
        $wxapp=$this->wxApp();
        $serv = $wxapp->server;
        $serv->push(function($msg) use($ServerClass){
            \PhalApi\DI()->logger->debug('RECV',json_encode($msg,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
            if (empty($ServerClass)) $ServerClass='\\'.__NAMESPACE__.'\\Server';
            $api = new $ServerClass();
            if (!empty($msg->MsgType)){
                $func = $msg->MsgType;
                return $api->$func($msg);
            }
            //return '接收到['.$msg->MsgType.']类型信息';
        });
        $response = $serv->serve();
        $response->send();
    }
}
