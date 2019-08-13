<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
if(isset($_SESSION["loggedinc"]) && $_SESSION["loggedinc"] === true){
    header("location: client/welcome.php");
    exit;
}
 
require_once "./database/config.php";
 
$email = $password = "";
$email_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
  
    
        
        $conn=mysqli_connect('localhost','root','','login');
   
        
        $query = "SELECT * FROM user WHERE email = '$email' and password='$password'";
        $result=mysqli_num_rows(mysqli_query($conn,$query));
        /*if($result==1){
            if ($result["Type"]=="Admin"){ 
            session_start();
                            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $email;                            
            
            // Redirect user to welcome page
            header("location: welcome.php");}
            else {
                session_start();
                            
            // Store data in session variables
            $_SESSION["loggedinc"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $email;                            
            
            // Redirect user to welcome page
            header("location: client/welcome.php"); }
 }

else{
  echo "<script> alert ('email or password incorrect');</script>";
}*/      var_dump($result);     
    }         
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>
				Shyam Suppliers
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
			  <img src="./image/login.png" style="width: 60%;" class="card-img-top mx-auto" alt="Login">
			  <div class="card-body">
			    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
	<button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i>&nbsp Login</button>&nbsp
	<span> <a href="register.php">Register </a> </span>

</form>
			  </div>

			</div>

		</div>

	</body>
</html>