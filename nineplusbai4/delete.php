<?php 

include('connect.php');

$error='';

if(isset($_GET['id_user'])){
    $id_user = $_GET['id_user'];

    $sql = "DELETE FROM users WHERE id='".$id_user."'";
    if($result = $con -> query($sql)){
        $error = 'xoa user id='.$id_user.' thanh cong';
    }else{
        $error = 'xoa hk thanh cong';
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
</head>
<body>
    <h3><?php echo $error;?></h3>
    <button><a href="qluser.php">ve home</a></button>
</body>
</html>