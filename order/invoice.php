<?php
require_once "../database/config.php";
$order_id = $_GET['id'];
$order_query="select * from orders where oid = '$order_id'";
$order_detail= mysqli_fetch_assoc(mysqli_query($conn, $order_query));
$customer_id = $order_detail["customerid"];
$customer_query = "select * from customer where cid = '$customer_id'";
$customer_detail = mysqli_fetch_assoc(mysqli_query($conn, $customer_query));

$cart_query = "select * from `cart` where `orderId` = '$order_id'";
$cart_result = mysqli_query($conn, $cart_query);
$cart_detail_arr = mysqli_fetch_all($cart_result);
echo mysqli_error($conn);

?>
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
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
	<?php
		include_once("../templates/header.php");
		?>
		<br/> <br/>
        <div class="row">
		<div class="container">
			<div class="card mx-auto" style="width: 100%">
			  <div class="card-body">
              <center><h1> Shyam Suppliers</h1></center><br><br>
    <div class="row">
    <div class="col-sm-5">
        <p>Phone:</p>
        <p>Email:</p>
        <p> Name: <?= $customer_detail["name"];?></p>
        <p>    Address: <?= $customer_detail["address"];?> </p>
    </div>
    <div class="col-sm-5">
        <p> Pan No: </p>
    </div>
    </div>

    </tr>

    <table  class="table table-dar mx-auto">
	<thead>
		<tr>
		    <th>SN</th>
            <th>Product Name</th>
			<th>Quantity</th>
			<th>Rate</th>
            <th>Total Price</th>
		</tr>
	</thead>
<tbody>
<?php 

    $sn=1;
    $grand_total; 
    //var_dump($cart_detail_arr);

    foreach($cart_detail_arr as $row)
	{
        $productName = $row[1];
        $product_query = "select * from product where name= '$productName'";
       $price = mysqli_fetch_assoc(mysqli_query($conn, $product_query))['price'];
        $total_price = intval($cart_detail_arr[2]) * intval($price);
        $grand_total+= $total_price;
        
        ?>
		<tr>
		<td><?php echo $sn; ?> </td>
		<td> <?php echo $row[1];?></td>
		<td> <?php echo $row[2];?></td>
		
        <td><?php echo "Rs ".$price; ?></td>
        <td><?php echo "Rs ". $total_price; ?></td>
		</tr>
	<?php 
		$sn++; 
    }
    $vat = intval($grand_total) * 13 / 100;
    $net_total = intval($grand_total) + $vat;
    ?>
    <tr><td></td><td></td><td></td><td><b>13 % VAT : </b></td><td>Rs <?php echo $vat; ?></td></tr>
    <tr><td></td><td></td><td></td><td><b>Grand Total: </b></td><td>Rs <?php echo $grand_total; ?></td></tr>
    <tr><td></td><td></td><td></td><td><b>Net Total: </b></td><td>Rs <?php echo $net_total; ?></td></tr>
</tbody>
</table>

<button class="btn btn-success" onclick="window.print()" >Print Invoice</button>
</div>    
    </div>
    </div>
    </div>
</body>
</html>