<?php

include 'connect.php';
session_start();

$check=1;

$error='';
$dsusers='';
$password_cookie='';
$email_cookie='';

if(isset($_COOKIE['email'])&&isset($_COOKIE['password'])){
  $email_cookie =  htmlspecialchars($_COOKIE['email']);
  $password_cookie =  htmlspecialchars($_COOKIE['password']);
  
}

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
      $email   = htmlspecialchars($_POST['email']);
      $pass   = htmlspecialchars($_POST['password']);
      $password   = md5($pass);


      $sql = "SELECT * FROM users where email='".$email."' AND password='".$password."'";


      $result = $con->query($sql);
      $data=[];

      if($result->num_rows >0){
          while($row = $result->fetch_assoc()){
              $data['users']=$row;
          }

          $_SESSION['name'] = $data['users']['name'];
          setcookie('email',$email,time()+(86400*30));
          setcookie('password',$pass,time()+(86400*30));
          $error = 'dang nhap thanh cong';
          $dsusers='<button><a href="qluser.php"><i class="fa fa-lock"></i> dluser</a></button>';
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

      <form action="" method="POST" class="khung" id="formdn">
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
              <input type="email" class="form-control" name="email" id="" value="<?php echo $email_cookie; ?>" placeholder="email">
              
            </div>
          </div>
        </div>
         
          
        
        <div class="row ">
            <div class="col-sm-2"></div>
            <div class="col-sm-6 ">
                <div class="form-group">
                <label for=""><b>Password</b></label>
                <input type="password" class="form-control "  name="password" value="<?php echo $password_cookie; ?>" placeholder="Password">
                </div>
            </div>
          
        </div>
        
        <div class="row ">
          <div class="col-sm-4"></div>
          <button type="submit" name="submit" class="btn btn-primary ">Đăng Nhap</button>
          <div class="col-sm-4"></div>
        </div>
        
        <button><a href="quenmk.php">Quên Mật khẩu?</a></button>
          
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
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script>

        
        $("#formdn").validate({
            rules: {
              email: {
                required:true,
                email:true

              },
              password:{
                required:true,
                minlenght:8
                
              }
             
            },
            messages: {
              email: {
                required:"moi nhap email",
                email:"email khong dung"
              },
              password:{
                required:"moi nhap password",
                minlenght:"password ít nhất 8 ký tự"
                
              }
             
            }
          });

    </script>
  </body>
</html>