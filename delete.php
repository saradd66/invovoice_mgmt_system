<?php

$pid=$_GET['pid'];
$sname='localhost';
$uname='root';
$pwd='';
$db='login';
$conn=mysqli_connect($sname,$uname,$pwd,$db);
if(!$conn)
{
	die('connectin failed'.mysqli_connect_error());
}
$sql="delete from product where pid=".$pid;
if(mysqli_query($conn,$sql));
	{
		header('location:manage.php?update='.$update);
	}

?>