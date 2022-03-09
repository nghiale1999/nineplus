<?php

include('connect.php');
session_start();


if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];
}

$sp_trentrang = 3;
if(!isset($_GET['trang'])){
    $trang=1;
}else{
    $trang= $_GET['trang'];
}
$tungtrang = ($trang-1)*$sp_trentrang;



$sql = "SELECT * FROM users LIMIT $tungtrang,$sp_trentrang";
$result = $con -> query($sql);
$data=[];

if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        $data[]=$row;
    }
}

$sql = "SELECT * FROM users ";
$result = $con -> query($sql);
$data2=[];

if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        $data2[]=$row;
    }
}
$tong =count($data2);
$ttrang= ceil($tong/3);
$i=1;



$html='';

foreach($data as $vl){
    $html .='<tr>
				<td>'.$vl['id'].'</td>
				<td>'.$vl['name'].'</td>
				<td>'.$vl['email'].'</td>

				<td><Button>update</Button></td>
				<td><Button>delete</Button></td>
			
				
			</tr>';
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>quản lý user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
        
                <th>update</th>
                <th>delete</th>

            </tr>
        </thead>
        <tbody>
            <?php  
                echo $html;
            ?>
            
        </tbody>
    </table>
     

<?php 
    echo '<p>Trang:</p>';
    for($i=1;$i<=$ttrang;$i++){       
        echo '<a style="margin:0 5px;" href="qluser.php?trang='.$i.'">'.$i.'</a>';
    }
 ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>