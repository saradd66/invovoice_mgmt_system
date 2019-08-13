<?php
$cid=$_GET['cid'];
require_once "../database/config.php";

$sql="delete from customer where cid=".$cid;
if(mysqli_query($conn,$sql));
	{
		header('location:manage.php?update='.$update);
	}

?>