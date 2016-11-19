<?php
require('redis.php');
$username=$_POST['username'];
$age=$_POST['age'];
$password=$_POST['password'];
$uid=$redis->incr("userid");
$flag=$redis->hmset("user:".$uid,array("uid"=>$uid,"username"=>$username,"password"=>$password,"age"=>$age));
$redis->rpush("uid",$uid);
if ($flag) {
	header("location:list.php");
}

