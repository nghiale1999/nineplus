<?php

include 'connect.php';
require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
require 'PHPMailer-master/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$check=1;

$error='';
$dsusers='';

if(isset($_POST['submit'])){
    
    if($_POST['email']==''){
        $error='moi nhap email';
        $check=2;
    }

    if($_POST['password']==''){
        $error='moi nhap password';
        $check=2;
    }


    if($check==1){
        $email   = $_POST['email'];
        $password   = md5($_POST['password']);


        $sql = "SELECT * FROM users where email='".$email."' AND password='".$password."'";


        $result = $con->query($sql);
      

        if($result->num_rows >0){
            
          $dsusers='<button><a href="dsusers.php"><i class="fa fa-lock"></i> dsusers</a></button>';

        //     $subject = "thông báo đăng nhập";
        //     $message = "bạn đã đăng nhập thành công";
        //     $header = "from: lenghiamailtest@gmail.com";
        //     if($success = mail ($email,$subject,$message,$header)==true){
        //       $error = $email;
        //     };
        // }else{
        //     $error = 'dang nhap that bai';

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
              $PHPMailer->Subject = 'thong bao dang nhap';
              $PHPMailer->Body = 'dang nhap thanh cong';
              $PHPMailer->send();
          } catch (Exception $exception) {
              echo $PHPMailer->ErrorInfo;
          }

          $error = 'dang nhap thanh cong';



        }else{
           $error = 'dang nhap that bai';
        }

    }
}








?>



<!doctype html>
<html lang="en">
  <head>
    <title>dang nhap</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


    <div class="br">

      <form action="" method="POST" class="khung">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4"><b>ĐĂNG Nhap</b></div>
          <div class="col-sm-4"></div>
        </div>
        <div class="row ">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
            <div class="form-group">
              <label for=""><b>Email</b></label>
              <input type="email" class="form-control" name="email" id=""  placeholder="email">
              
            </div>
          </div>
        </div>
         
          
        
        <div class="row ">
            <div class="col-sm-2"></div>
            <div class="col-sm-6 ">
                <div class="form-group">
                <label for=""><b>Password</b></label>
                <input type="password" class="form-control "  name="password" id="password" placeholder="Password">
                </div>
            </div>
          
        </div>
        
        <div class="row ">
          <div class="col-sm-4"></div>
          <button type="submit" name="submit" class="btn btn-primary ">Đăng Nhap</button>
          <div class="col-sm-4"></div>
        </div>
        <?php echo $error;?>
        <br>
        <?php echo $dsusers;?>
        
      </form>
      
    </div>
    
      

    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>