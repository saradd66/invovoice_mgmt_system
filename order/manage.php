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
		include_once("../templates/header.php");
		?>
		<br/> <br/>
		<div class="container">
			<div class="card mx-auto" style="width: 100%">
			  <div class="card-body">
              <table  class="table table-dark mx-auto">
	<thead>
		<tr>
		    <th>SN</th>
			<th>Order Id</th>
            <th>Customer ID</th>
			<th>Customer Name</th>
			<th>Invoice</th>
		</tr>
	</thead>
<tbody>
<?php 
require_once "../database/config.php";

$sql="select * from orders";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$sn=1;
	$customer_id = $row['customerid'];
	$sql1= "select customer.name from customer where cid='$customer_id'";
	$customer =mysqli_fetch_assoc(mysqli_query($conn,$sql1));
	while($row=mysqli_fetch_assoc($result))
	{?>
		<tr>
		<td><?php echo $sn; ?> </td>
		<td> <?php echo $row['id'];?></td>
		<td> <?php echo $row['customerid'];?></td>
		<td> <?php echo $customer["name"];?></td>
		<td><a href="edit.php?id=<?php echo $row['id']; ?>">Detail</a></td>
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