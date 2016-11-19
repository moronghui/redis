<?php
require('redis.php');
$uid=$_GET['uid'];
$redis->del("user:".$uid);
$redis->lrem("uid",$uid);
header("location:list.php");