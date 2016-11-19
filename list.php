<a href="add.php">注册</a>
<?php
require("redis.php");
//总行数
$count=$redis->lsize("uid");
//页大小
$page_size=3;
//当前页码
$page_num=(!empty($_GET['page']))?$_GET['page'] : 1;
//页总数
$page_count=ceil($count/$page_size);
$offset=($page_num-1)*$page_size;
$uids=$redis->lrange("uid",$offset,$offset+$page_size-1);
foreach ($uids as $uid) { 
	$data[]=$redis->hgetall("user:".$uid);
}
$data=array_filter($data);
//var_dump($data);
?>

<table border="1">
	<th>uid</th>
	<th>username</th>
	<th>age</th>
	<th>操作</th>
	<?php
		foreach ($data as $dd) {
	?>
	<tr>
		<td><?php echo $dd['uid']?></td>
		<td><?php echo $dd['username']?></td>
		<td><?php echo $dd['age']?></td>
		<td><a href="del.php?uid=<?php echo $dd['uid'] ?>">删除</a>&nbsp;<a href="mod.php?uid=<?php echo $dd['uid'] ?>">编辑</a></td>
	</tr>
	<?php
		}
	?>
	<tr>
		<td colspan="4">
			<a href="?page=<?php echo (($page_num-1)<1)?1:($page_num-1) ?>">上一页</a>
			<a href="?page=<?php echo ($page_num+1)>$page_count?$page_count:$page_num+1 ?>">下一页</a>
			<a href="?page=1">首页</a>
			<a href="?page=<?php echo $page_count ?>">尾页</a>
			当前<?php echo $page_num ?>页
			总共<?php echo $page_count ?>页
			总共<?php echo $count ?>个用户
		</td>
	</tr>
</table>
