<?php

$customerName=$productName=$quantity=0;
require_once "../database/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nop=$_POST['nop'];
    $customerid=$_POST['customerid'];

    $product_arr=array();
    $qty_arr=array();
    for($i=1;$i<=intval($nop);$i++){
        array_push($product_arr,$_POST['productName'.$i]);
        array_push($qty_arr,$_POST['quantity'.$i]);

    }
    $order="insert into orders(customerid) values('$customerid')";
    mysqli_query($conn,$order);
    $orderid="select oid from orders order by oid DESC";
    $oid=mysqli_fetch_array(mysqli_query($conn,$orderid))[0];

    for($i=0;$i<=intval($nop)-1;$i++){
        $product=$product_arr[$i];
        $quantity=$qty_arr[$i];
        $total_quantity = mysqli_fetch_assoc(mysqli_query($conn,"select * from product where name = '$product'"))["quantity"];
        $rem_quantity = intval($total_quantity) - intval($quantity);
        $cart_query="insert into cart(productName,quantity,orderId) values('$product','$quantity','$oid')";
        mysqli_query($conn,$cart_query);
        $dec_query = "update product set quantity= '$rem_quantity' where name = '$product'";
        mysqli_query($conn, $dec_query);
        echo "<script> alert ('New Order Added');</script>";
    }
}

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
		<script type="text/javascript" src="./js/main.js"> </script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
	<?php
		include_once("../templates/header.php");
		?>
		<br/> <br/>
		<div class="container">
			<div class="card mx-auto" style="width: 18rem;">
			  <div class="card-body">
        <p><b>Order</b></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <p>Customer's name</p><select name="customerid">
            <?php
                $query=mysqli_query($conn,"select * from customer");
                
                while($customer=mysqli_fetch_array($query)){
                    echo "<option value='".$customer['cid']."'>".$customer['name']."</option>";
                }
            ?>
            </select>
            

        </div>
        <?php                
             $query2=mysqli_query($conn,"select * from product");
             ?>
                <span id="addProduct" name="addProductBtn" onclick="addProduct()">+</span>
        <div name="qty" id="product_block">
        <div class="form-group">
            <p>Product</p>
            
            <select name="productName1">
            <?php

                while($product=mysqli_fetch_array($query2)){
                    echo "<option value='".$product['name']."'>".$product['name']."</option>";
                }
            ?>
            </select>

            <label>product quantity</label>
            <input type="text" name="quantity1" class="form-control" >
                
            </div>
        </div>
                
      
            
            <div class="form-group">
            <input type="hidden" name="nop" id="nop" value=1>
                <input type="submit" class="btn btn-primary" value="Add">
            </div>
        </form>
    </div>    
    </div>
    </div>
</body>
<script>

    var qty = document.getElementById('product_block').innerHTML;

    function addProduct(){
        updateNumber();
        replicate();
        updateName();

    }   

    function updateNumber(){
        var number = document.getElementById("nop");
        var nop = number.value;
        nop = parseInt(nop) + 1;
        number.value = nop;
    }

    function replicate(){
        var product_div= document.getElementById("product_block");
        product_div.innerHTML = product_div.innerHTML + qty;
    }

    function updateName(){
        
        var number_o = document.getElementById("nop");
        productName = document.getElementsByName("productName1");
        quantity = document.getElementsByName("quantity1");

        target = productName.length -1;
        new_name = productName[0].getAttribute("name")
        new_name = new_name.replace("1",parseInt(number_o.value));
        productName[target].setAttribute("name",new_name);

        new_quantity = quantity[0].getAttribute("name")
        new_quantity = new_quantity.replace("1",parseInt(number_o.value));
        quantity[target].setAttribute("name",new_quantity);
    }
</script>
<style>
#addProduct{
    cursor:pointer;
}
</style>
</html>