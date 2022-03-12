<?php
include('connect.php');
include "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
include "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
include 'PHPMailer-master/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$error = '';
$check=1;
$data=[];
function randomPassword($length) 
{ 
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?"; 
$length = rand(10, 16); 
$password = substr( str_shuffle(sha1(rand() . time()) . $chars ), 0, $length );
 return $password;
}


if(isset($_POST['submit'])){
   
   
    if($_POST['email']==''){
        
        $check=2;
    }

    if($check==1){
        $email   = $_POST['email'];

        $sql = "SELECT * FROM users where email='".$email."'";
        $result = $con->query($sql);

        if($result->num_rows >0){
            
            while($row = $result->fetch_assoc()){
              $data['users']=$row;
            }

            $id_user = $data['users']['id'];
            
            $ngaytao = date("Y/m/d");
            

            
            $newdate = strtotime ( '+1 day' , strtotime ( $ngaytao ) ) ;
            $ngayhethan = date("Y/m/d", $newdate);

            

            
            $random = randomPassword(8);
            $token = md5($random);
            $sql = "INSERT INTO doimk (id_user,email,token,ngaytao,ngayhethan) VALUES('$id_user','$email','$token','$ngaytao','$ngayhethan')";
            $result = $con -> query($sql);
            
            
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
            $PHPMailer->Subject = 'dang ky mat khau moi';
            $PHPMailer->Body = 'doi mat khau vui long click vao link: http://localhost:8080/hoc_php/nineplusbai4/reset-password.php?token='.$random.'';
            $PHPMailer->send();      
            $error = 'lay mat khai thanh cong';
          }catch (Exception $exception) {
            echo $PHPMailer->ErrorInfo;
          }







            
            
        }

    }






}


?>








<!doctype html>
<html lang="en">
  <head>
    <title>quên mật khẩu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="br">

        <form action="" method="POST" class="khung" id="formmk">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"><b>Lấy lại mật khẩu</b></div>
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
            <div class="col-sm-5"></div>
            <button type="submit" name="submit" class="btn btn-primary ">Lấy Lại</button>
            <div class="col-sm-4"></div>
        </div>
        
        
            
       
        
        </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script>

        
        $("#formmk").validate({
            rules: {
              email: {
                required:true,
                email:true

              }
              
             
            },
            messages: {
              email: {
                required:"moi nhap email",
                email:"email khong dung"
              }
              
             
            }
          });

    </script>
</body>
</html>