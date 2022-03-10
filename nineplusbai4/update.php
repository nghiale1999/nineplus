<?php 

include('connect.php');


$data=[];
$error = '';
if(isset($_GET['id_user'])){

    $id_user = $_GET['id_user'];
    $sql = "SELECT * FROM users where id='".$id_user."'";

    $result = $con -> query($sql);
    

    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            $data[]=$row;
        }
    }



}


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    $sql =" UPDATE users SET name = '".$name."', email = '".$email."', password = '".$password."' WHERE id='".$id_user."' ";

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

        id: <input type="text" value="<?php echo $data[0]['id']?>" readonly>
        name: <input type="text" name="name" value="<?php echo $data[0]['name']?>" >
        email: <input type="text" name="email" value="<?php echo $data[0]['email']?>" >
        password: <input type="password" name="password" value="<?php echo $data[0]['password']?>" >
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