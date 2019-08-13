<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
$pname=$quantity=$price=0;
$name='localhost';
$uname='root';
$pwd='';
$db='login';
$conn=mysqli_connect($name,$uname,$pwd,$db);
if(!$conn){
	die("connection failed".mysqli_connect_error());
}
$pname=$_POST['name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$sql= "Insert into product(name,quantity,price) values ('$pname','$quantity','$price')";
if (mysqli_query($conn,$sql))
{
	echo "<script> alert ('New Product Added');</script>";
}
else{
	echo 'failed'.mysqli_error($conn);
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
		include_once("./templates/header.php");
		?>
		<br/> <br/>
		<div class="container">
			<div class="card mx-auto" style="width: 18rem;">
			  <div class="card-body">
        <p>Add Product</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control" >
             
            </div>    
            <div class="form-group">
                <label>product quantity</label>
                <input type="text" name="quantity" class="form-control" >
                
            </div>
            <div class="form-group">
                <label>product price per unit</label>
                <input type="text" name="price" class="form-control" >
                
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add">
            </div>
        </form>
    </div>    
    </div>
    </div>
</body>
</html>