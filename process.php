<?php

    $email=$_POST['email'];
    $password=$_POST['password'];

    $email=stripcslashes($email);
    $password=stripcslashes($password);

    
    $email=mysql_real_escape_string($email);
    $password=mysql_real_escape_string($password);

    $conn=new mysqli('localhost','root','','login');
    if($conn->connect_error){
        die('error'.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("select * from user where email=? and password=?");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        if($rows['username']== $username && $rows['password']== $password){
            echo "logged in";
    
        }
        else{
            echo"error";
        }
        $stmt->close();
        $conn->close();
    }

    
    ?>