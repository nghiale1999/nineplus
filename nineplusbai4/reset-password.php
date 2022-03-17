<?php 

include('connect.php');

$token='';
$error='';
$check=1;

if(isset($_GET['token'])){
    $token = $_GET['token'];
}


if(isset($_POST['submit'])){



    if($_POST['email']==''){
        
        $check=2;
    }

    if($_POST['password']==''){
       
        $check=2;
    }

    if($check==1){

        $email   = htmlspecialchars($_POST['email']);
        $pass   = htmlspecialchars($_POST['password']);



        $number = preg_match('@[0-9]@', $pass);
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $specialChars = preg_match('@[^\w]@', $pass);
        
        if(strlen($pass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
          $error = "password khong đúng định dạng";
        }else{
          $password   = md5($pass);
          $ngayhan = date("Y/m/d");
          $sql = "SELECT * FROM doimk WHERE email='".$email."' ORDER BY id DESC LIMIT 1";
          $result = $con->query($sql);
          $data=[];

          if($result->num_rows >0){
              while($row = $result->fetch_assoc()){
                  $data['users']=$row;
              }
          }
          foreach($data as $vl){

              if($email == $vl['email'] && $ngayhan >= $vl['ngayhethan']){

                  $sql = "UPDATE users SET password = '".$password."' WHERE email='".$email."'";
                  $result = $con->query($sql);
                  $error = 'doi password thanh cong';
                  
              }else{
                  $error = 'doi password that bai';
              }
              
          }
        }



        
        

    }


    

}



?>





<!doctype html>
<html lang="en">
  <head>
    <title>doi mat khau</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


    <div class="br">

      <form action="" method="POST" class="khung" id="formdmk">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4"><b>đổi mật khẩu</b></div>
          <div class="col-sm-4"></div>
        </div>
        <div class="row ">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
            <div class="form-group">
              <label for=""><b>email</b></label>
              <input type="email" class="form-control" name="email" id=""  placeholder="email">
              
            </div>
          </div>
        </div>
         
          
        
        <div class="row ">
            <div class="col-sm-2"></div>
            <div class="col-sm-6 ">
                <div class="form-group">
                <label for=""><b>token</b></label>
                <input type="text" class="form-control "  name="token" value="<?php echo $token; ?>" placeholder="token" readonly>
                </div>
            </div>
          
        </div>
        <div class="row ">
            <div class="col-sm-2"></div>
            <div class="col-sm-6 ">
                <div class="form-group">
                <label for=""><b>password</b></label>
                <input type="password" class="form-control "  name="password"  placeholder="Password">
                </div>
            </div>
          
        </div>
        
        <div class="row ">
          <div class="col-sm-4"></div>
          <button type="submit" name="submit" class="btn btn-primary ">đổi mật khẩu</button>
          <div class="col-sm-4"></div>
        </div>
        <button ><a href="dangnhap.php">đăng nhập</a></button>
        
          
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

      $(document).ready(function () {  
        $("#formdmk").validate({
            rules: {
              email: {
                required:true,
                email:true,

              },
              password:{
                required:true,
                minlenght:6
                
              }
             
            },
            messages: {
              email: {
                required:"moi nhap email",
                email:"email khong dung",
              },
              password:{
                required:"moi nhap password",
                minlenght:"password ít nhất 6 ký tự",
               
              }
             
            }
          });
        });

    </script>
  </body>
</html>