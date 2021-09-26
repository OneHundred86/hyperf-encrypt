#### hyperf加密组件

##### 一、安装

```shell
composer require "oh86/encrypt"
```

##### 二、配置

1. 发布配置文件与资源

   ```
   php bin/hyperf.php vendor:publish oh86/encrypt
   ```

2. 配置.env

   ```
   SM4_KEY=08c8e6db4907dc755a6097d0abd417c5	# 32位16进制字符串
   ```

三、使用示例

```
>>> sm3("123");
=> "6e0f9e14344c5406a0cf5a3b4dfb665f87f4a771a31f7edbb5c72874a32b2957"
>>> 
>>> $encrypt = sm4_encrypt("hello world")
=> "f7064332db25a4ab8615721c49f49ee6"
>>> sm4_decrypt($encrypt)
=> "hello world"
>>> 
>>> bcrypt("test")
=> "$2y$10$jj93.f52XlQtXt5Gp7kwq.zkwRfBCMKIIkLf9AZNXFqSC5WV.bB9."
>>> 
```



