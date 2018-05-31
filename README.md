## 微信扩展 \PhalApi\WeiXin

微信公众号、企业号等开发扩展, 使用[Eastwechat](https://www.easywechat.com)。

```php
new \PhalApi\WeiXin\Lite(服务名);
```

1. 支持公众号、企业微信等，具体参考[Eastwechat文档](https://www.easywechat.com/docs),传入不同的服务名就可以调用不同的服务。
2. 只是简单的提供了一个调用方法，内置默认服务。
3. 目前该扩展我主要是用于企业微信，本文的例子也都是企业微信，传入的服务名为`Work`;
4. 扩展msg目录里面的类是为了支持IDE友好提示而设立的。

### 安装

在项目下直接运行以下命令即可完成扩展安装。

```
composer require overtrue/wechat:~4.0 -vvv
composer require chenall/phalapi-weixin
```

### 配置

根据要使用的不同的服务类型添加相应的配置文件 配置文件名 **wx_服务名.php**
本例为企业微信

配置文件./Config/wx_Work.php
```php
return array(
    /**
     * 扩展类库 - 微信公众号配置
     * 注： 具体配置参数请参考 https://www.easywechat.com/docs
     */
    'corp_id' => 'xxxxxxxxxxxxxxxxx',

    'agent_id' => 100020, // 如果有 agend_id 则填写
    'secret'   => 'xxxxxxxxxx',

    // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
    'response_type' => 'array',

    'log' => [
        'level' => 'debug',
        'file' => __DIR__.'/wechat.log',
    ],
);
```

### 注册

在./config/di.php文件中，注册微信服务(可以按需注册多个服务);

```php
//企业微信
$di->wxWork = function(){
    $weixin = new \PhalApi\WeiXin\Lite('Work');
    return $weixin->wxApp();
};
//公众号
$di->officialAccount = function(){
    $weixin = new \PhalApi\WeiXin\Lite('officialAccount');
    return $weixin->wxApp();
};
```
### 服务端访问入口(消息接收处理,需要单独的访问入口) 

需要对接收的信息进行处理时才需要使用

```php
//./Public/WeiXin.php
/**
 * 统一访问入口
 */
require_once dirname(__FILE__) . '/init.php';

$server = new \PhalApi\WeiXin\Lite('Work');
//默认使用内置的消息处理 \PhalApi\WeiXin\Server
$server->response();
```

也可以使用自己定义的消息处理接口

```php
//./Public/WeiXin.php
/**
 * 统一访问入口
 */
require_once dirname(__FILE__) . '/init.php';

$server = new \PhalApi\WeiXin\Lite('Work');
$server->response('\\WeiXin\\Work\\Server');
```
```php
//可以直接扩展\PhalApi\WeiXin\Server，也可以完全自己实现
class Server extends \PhalApi\WeiXin\Server {
    public function text($message){
        .....
        //消息类型 可以返回各种消息类型，比如图片，文本等，具体的使用方法参考说明文档
        return 要返回给消息发送者的信息;
    }
}
```
