<?php

include 'connect.php';
session_start();

$check=1;

$error='';
$password_cookie='';
$email_cookie='';

if(isset($_COOKIE['email'])&&isset($_COOKIE['password'])){
  $email_cookie =  htmlspecialchars($_COOKIE['email']);
  $password_cookie =  htmlspecialchars($_COOKIE['password']);
  
}

if(isset($_POST['submit'])){
    
    if($_POST['email']==''){
        
        $check=2;
    }

    if($_POST['password']==''){
        
        $check=2;
    }

    if(isset($_POST['click'])){
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
            header("location:qluser.php");
        }else{
            $error = 'dang nhap that bai';
        }
      } 
    }else{
      if($check==1){
        setcookie('email',time()-100);
        setcookie('password',time()-100);
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
            
            header("location:qluser.php");
        }else{
            $error = 'dang nhap that bai';
        }
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
          <div class="col-sm-4"><b>đăng nhập</b></div>
          <div class="col-sm-4"></div>
        </div>
        <div class="row ">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
            <div class="form-group">
              <label for=""><b>email</b></label>
              <input type="email" class="form-control" name="email" id="" value="<?php echo $email_cookie; ?>" placeholder="email">
              
            </div>
          </div>
        </div>
         
          
        
        <div class="row ">
            <div class="col-sm-2"></div>
            <div class="col-sm-6 ">
                <div class="form-group">
                <label for=""><b>password</b></label>
                <input type="password" class="form-control "  name="password" value="<?php echo $password_cookie; ?>" placeholder="Password">
                </div>
            </div>
          
        </div>
        <div class="row ">
            <div class="col-sm-2"></div>
            <div class="col-sm-6 ">
                <span>
                  <input type="checkbox" class="checkbox" name="click"> 
                    remember password
                </span>
            </div>
          
        </div>
        
        <div class="row ">
          <div class="col-sm-4"></div>
          <button type="submit" name="submit" class="btn btn-primary ">Đăng Nhap</button>
          <div class="col-sm-4"></div>
        </div>
        
        <button><a href="quenmk.php">Quên Mật khẩu?</a></button>
        <br> 
        <?php echo $error;?>
        
        
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
                
              },
              click:{
                required:true,

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
                
              },
              click:{
                required:'mời click remember password'
              }
             
            }
          });

    </script>
  </body>
</html>