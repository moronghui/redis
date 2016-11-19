<?php
//实例化
$redis=new Redis();
//连接
$a=$redis->connect("localhost",6379);
//授权
$redis->auth("moronghui");
//$redis->set("age","21");
//var_dump($a);
//$data=$redis->keys("*");
//var_dump($data);