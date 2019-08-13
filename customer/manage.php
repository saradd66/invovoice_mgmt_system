<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>
				Account Management System
		</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script type="text/javascript" src="./js/main.js"> </script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
	<?php
		include_once("./templates/header.php");
		?>
		<br/> <br/>
		<div class="container">
			<div class="card mx-auto" style="width: 100%">
			  <div class="card-body">
              <table  class="table table-dark mx-auto">
	<thead>
		<tr>
		    <th>SN</th>
            <th>Product Id</th>
			<th>Customer name</th>
			<th>Customer address</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
<tbody>
<?php 
$sname='localhost';
$uname='root';
$pwd='';
$db='login';
$conn=mysqli_connect($sname,$uname,$pwd,$db);
if(!$conn)
{
	die('connectin failed'.mysqli_connect_error());
}
$sql="select * from customer";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$sn=1;
	while($row=mysqli_fetch_assoc($result))
	{?>
		<tr>
		<td><?php echo $sn; ?> </td>
		<td> <?php echo $row['cid'];?></td>
		<td> <?php echo $row['name'];?></td>
		<td> <?php echo $row['address'];?></td>
		
		<td><a href="edit.php?cid=<?php echo $row['cid']; ?>">Edit</a></td>
		<td><a href="delete.php?cid=<?php echo $row['cid']; ?>">Delete</a></td>
		</tr>
	
	
	<?php
		$sn++; 
	}
}
mysqli_close($conn);
?>
</tbody>
</table>
</div>    
    </div>
    </div>
</body>
</html>