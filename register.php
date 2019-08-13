<?php
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $typeErr = "";
$name = $email = $password = $type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if e-mail address is well-formed
    if (!filter_var($password<5 || $password>10)) {
      $passwordErr = "Invalid password format"; 
    }
  }
    
  if (empty($_POST["type"])) {
    $typeErr = "type is required";
  } else {
    $type = test_input($_POST["type"]);
    
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
		<br/> 
		<div class="container">
			<div class="card mx-auto" style="width: 18rem;">
			  <img src="./image/login.png" style="width: 60%;" class="card-img-top mx-auto" alt="Login">
			  <div class="card-body">
<p><span class="error">* Required field</span></p>
<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">  
  <b>Name</b>: <div class="form-group">
  <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
  <span class="error">* <?php echo $nameErr;?></span></div>

  <b>Email:</b> <div class="form-group">
  <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
  <span class="error">* <?php echo $emailErr;?></span>
</div>
  <b>Password:</b> <div class="form-group">
  <input type="password" name="password"  class="form-control" value="<?php echo $password; ?>">
  <span class="error">*<?php echo $passwordErr;?></span>
 </div>
  <b>Type:</b><div class="form-group">
  <?php $checked = '';
  $checkedC = '';
  if($type === 'Admin'){
    $checked = 'selected';
  }
  else{
    $checkedC = 'selected';
  }?>
<br>
   Admin: <input type="radio" name="type" class="form-control" value="Admin" selected="<?php echo $checked ?>">
   Client: <input type="radio" name="type" class="form-control" value="Client" selected="<?php echo $checkedC ?>"> <br>
  <span class="error">* <?php echo $typeErr;?></span></div>  

  <input type="submit" class="btn btn-primary" name="submit" value="Register">  &nbsp
  <span> <a href="index.php">Sign up </a> </span>

  </div>
</form>
</div>
</div>
</div>
</body>

<?php
if(!empty($name)&&(!empty($email)) && (!empty($password)) &&(!empty($type))){
    
    $conn=new mysqli('localhost','root','','login');
    if($conn->connect_error){
        die('error'.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into user(name,email,password,type) values (?,?,?,?)");
        $stmt->bind_param("ssss",$name,$email,$password,$type);
        $stmt->execute();
        echo("Successfully registered");
        $stmt->close();
        $conn->close();
    }

}
else{
echo $nameErr;echo "<br>";
echo $emailErr;echo "<br>";
echo $passwordErr;echo "<br>";
echo $typeErr;echo "<br>";

}
?>

