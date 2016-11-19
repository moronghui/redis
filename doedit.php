<?php
require('redis.php');
$uid=$_POST['uid'];
$username=$_POST['username'];
$age=$_POST['age'];
$password=$_POST['password'];
$flag=$redis->hmset("user:".$uid,array("uid"=>$uid,"username"=>$username,"age"=>$age));
if ($flag) {
	header("location:list.php");
}