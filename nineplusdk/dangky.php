<?php

include 'connect.php';

$error='moi ban dang ky';
$error_name='';
$error_password='';
$error_email='';
$check=1;


if(isset($_POST['submit'])){

    if($_POST['name']==''){
        $error_name='moi nhap ten';
        $check=2;
    }
    if($_POST['password']==''){
        $error_password='moi nhap password';
        $check=2;
    }
    if($_POST['email']==''){
        $error_email='moi nhap email';
        $check=2;
    }

    if($check==1){
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];


        $sql = "INSERT INTO users (email,password,name) VALUES('$email','$password','$name')";

        

        if($result = $con->query($sql)){
            $error = "dang ky thanh cong moi ban dang nhap";
        }else{
            $error = 'dang ky that bai';
        }
    }

}

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dangky</title>
</head>
<body>
<h2><b><?php echo $error;  ?></b></h2>
    <form action="" method="POST">
        Name:<input type="text" name="name" placeholder="Name">
        <p><?php echo $error_name;  ?></p>
        Password:<input type="password" name="password" placeholder="Password">
        <p><?php echo $error_password;  ?></p>
        Email:<input type="Email" name="email" placeholder="Email">
        <p><?php echo $error_email;  ?></p>
        <button type="submit" name='submit' class="btn btn-primary" >Đăng Ký</button>
    </form>
    <button ><a href="dangnhap.php">Đăng nhập</a></button>

</body>
</html>