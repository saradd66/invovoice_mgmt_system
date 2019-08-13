<?php
session_start();
if(!isset($_SESSION["loggedinc"]) || $_SESSION["loggedinc"] !== true){
    header("location:../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
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
			<div class="row">
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
					  <img src="../image/user.png" class="card-img-top mx-auto " style="width: 70%" alt="">
					  <div class="card-body">
					    <h5 class="card-title">Profile Info</h5>
					    <p class="card-text fa fa-user">&nbsp <?php echo htmlspecialchars($_SESSION["email"]); ?></p><br/>
						<p class="card-text fa fa-user">&nbsp Shyam Suppliers</p><br/>
					  </div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="jumbotron" style="width:100%;height:100%">
						<h1> Hello, Client </h1>
						<div class="row">
						<div class="col-sm-6">
							<br/>
							<iframe src="https://freesecure.timeanddate.com/clock/i6uqqmi3/n117/szw160/szh160/hoc000/hbw2/hfceee/cf100/hncccc/fdi76/mqc000/mql10/mqw4/mqd98/mhc000/mhl10/mhw4/mhd98/mmc000/mml10/mmw1/mmd98" frameborder="0" width="160" height="160"></iframe>

						</div>
						<div class="col-sm-6">
							 <div class="card">
						      <div class="card-body" style="width: 20rem;">
						        <h5 class="card-title">contact us</h5>
								<p class="card-text">Shyam Krishna Shrestha</p>
						        <p class="card-text">shyamkrsnshrestha@gmail.com</p>
						        <p class="card-text">011-620045/9869151638</p>
						      </div>
						    </div>
 
						</div>
					</div>
				</div>


				</div>
				
			</div>

		</div>
<br/> <br/>
		<div class="container">
			<div class="row"
					<div class="col-md-6">
					<div class="card">
						      <div class="card-body" style="width: 20rem;">
						        <h5 class="card-title">Products</h5>
						        <p class="card-text">Here you can view product detail</p>
						        <a href="client.php" class="btn btn-primary mx-edit fa fa-edit">View </a>
							</div>
							</div>

					</div>
				</div>
			</div>
		</div>

	
	</body>
</html>
