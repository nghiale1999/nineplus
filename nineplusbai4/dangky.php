<?php

include 'connect.php';
include "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
include "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
include 'PHPMailer-master/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$error ='';
$check = 1;
if(isset($_POST['submit'])){

  if($_POST['username']==''){
      $error='moi nhap ten';
      $check=2;
  }else if($_POST['password']==''){
      $error='moi nhap password';
      $check=2;
  }else if($_POST['passwordcf']==''){
      $error='moi nhap password confirm';
      $check=2;
  }else if($_POST['email']==''){
      $error='moi nhap email';
      $check=2;
  }

  if($check==1){
    
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $passwordcf = htmlspecialchars($_POST['passwordcf']);
    $email = htmlspecialchars($_POST['email']);







      $number = preg_match('@[0-9]@', $password);
      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@', $password);
      $specialChars = preg_match('@[^\w]@', $password);
     
      if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
      
        $error = "password khong đúng định dạng";
      }else if($password != $passwordcf){
        $error = "password và password confirm không trùng khớp";
      }else{
        $sql1 = "SELECT * FROM users where email='".$email."'";
        $result = $con->query($sql1);
        if($result->num_rows >0){
          $error = "email bị trùng";
        }else{
          $pass =  md5($_POST['password']);
          $sql = "INSERT INTO users (email,password,name) VALUES('$email','$pass','$username')";
          if($result = $con->query($sql)){
          $PHPMailer = new PHPMailer(true);         
          try {
            $PHPMailer->SMTPDebug = 0;
            $PHPMailer->isSMTP();
            $PHPMailer->Host = 'smtp.gmail.com';
            $PHPMailer->SMTPAuth = true;
            $PHPMailer->Username = 'lenghiamailtest@gmail.com';
            $PHPMailer->Password = '0337458674';
            $PHPMailer->SMTPSecure = 'ssl';
            $PHPMailer->Port = 465;              
            $PHPMailer->setFrom('lenghiamailtest@gmail.com', 'lenghia');
            $PHPMailer->addAddress($email ,'user');              
            $PHPMailer->isHTML(true);
            $PHPMailer->Subject = 'thông báo đăng ký';
            $PHPMailer->Body = 'bạn đã đăng ký thành công';
            $PHPMailer->send();      
            $error = "đăng ký thành công mời bạn đăng nhập";
          }catch (Exception $exception) {
            echo $PHPMailer->ErrorInfo;
          }

        }
      }

    }
      
    
    

  }

}

?>




      





<!doctype html>
<html lang="en">
  <head>
    <title>dang ky</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


    <div class="br">
      <form action="" method="POST" class="khung" id="formdk">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4"><b>đăng ký</b></div>
          <div class="col-sm-4"></div>
        </div>
        <div class="row ">
          <div class="col-sm-6">
            <div class="form-group">
              <label for=""><b>username</b></label>
              <input type="text" class="form-control" name="username" id="" placeholder="username">
              
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for=""><b>email</b></label>
              <input type="email" class="form-control" name="email" id=""  placeholder="email">
              
            </div>
          </div>
          
        </div>
        <div class="row ">
          <div class="col-sm-6 ">
            <div class="form-group">
              <label for=""><b>password</b></label>
              <input type="password" class="form-control "  name="password" id="password" placeholder="Password">
            </div>
          </div>
          <div class="col-sm-6 ">
            <div class="form-group">
              <label for=""><b>password confirm</b></label>
              <input type="password" class="form-control " name="passwordcf" id="passwordcf" placeholder="Password Confirm">
            </div>
          </div>
        </div>
        
        <div class="row ">
          <div class="col-sm-4"></div>
          <button type="submit" name="submit" class="btn btn-primary ">đăng ký</button>
          <div class="col-sm-4"></div>
        </div>
        <p id="err"><?php echo $error;?></p>
        
        
        <br>
        <button ><a href="dangnhap.php">đăng nhập</a></button>
        
      </form>
    </div>
    
      
      

    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<script>


  document.getElementById('khung').addEventListener('submit',function() {
    var password = document.getElementById('password').value;
    var passwordcf = document.getElementById('passwordcf').value;
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    var err='';

    if(!strongRegex.test(password)){
      err = "password hk dung dinh dang";
      
    }else if(password != passwordcf){
      err = "password confirm hk trung";
     
    }
    $('p#err').text(err);
  });

    
</script>