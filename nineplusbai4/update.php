<?php 

include('connect.php');
$data=[];
$error = '';
if(isset($_GET['id_user'])){

    
  
  
    $id_user = isset($_GET['id_user'])?(string)(int)$_GET['id_user']:false;
    $sql= 'SELECT * FROM users WHERE id= ' .$id_user;
    

    
    $result = $con -> query($sql);
      
    if($result->num_rows >0){
      while($row = $result->fetch_assoc()){
        $data[]=$row;
      }
    }else{
      $error = 'không tìm thấy user ';
    }
  
}



if(isset($_POST['submit'])){
  
    $name = htmlspecialchars(mysqli_real_escape_string($con,$_POST['name']));    
    $sql =" UPDATE users SET name = '".$name."' WHERE id='".$id_user."' ";

    if($result = $con -> query($sql)){
        $error = 'update user id='.$id_user.' thanh cong';
    }else{
        $error = 'update hk thanh cong';
    }
}



?>


<!doctype html>
<html lang="en">
  <head>
    <title>update</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <form action="" method="post">
        name: <input type="text" name="name" value="<?php echo $data[0]['name']?>" >
        email: <input type="text" name="email" value="<?php echo $data[0]['email']?>" readonly>
        
        <button type="submit" name="submit">update</button>
        
    </form>

    <h5><?php echo $error;?></h5>
    <button><a href="qluser.php">ve home</a></button>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>