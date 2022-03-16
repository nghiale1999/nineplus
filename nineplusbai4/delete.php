<?php 

include('connect.php');

$error='';

if(isset($_POST['id_user'])){
    $id_user = $_POST['id_user'];

    $sql = "DELETE FROM users WHERE id='".$id_user."'";
    if($result = $con -> query($sql)){
        echo 'xoa user id='.$id_user.' thanh cong';
    }else{
        echo 'xoa hk thanh cong';
    }
    
}
?>

