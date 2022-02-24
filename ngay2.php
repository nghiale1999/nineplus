<?php
//set_time_limit(20);



// 1. Bài tập tính tổng : S = 1 + 2 + 3 + 4 + ... + n  
// $n=10;
// $tong=0;
// for($i=1; $i<= $n; $i++){
//     $tong= $tong+ $i;
// }

// echo $tong;


// 2. Tính tổng : S = 1 + 1*2 + 1*2*3 + 1*2*3*4 + ... + 1*2*3*4*...*n 

// $n=4;
// $tong=0;

// for($i=1;$i<=$n;$i++){
//     $tich=1;
//     for($j=1;$j<=$i;$j++){
//         $tich=$tich*$j;
//     }
//     $tong= $tong + $tich;
// }
// echo $tong;



// 3.Tính tổng số nguyên lẻ tử 1 -> n   

// $n=10;
// $tong=0;
// for($i=0;$i<=$n;$i++){
//     if($i%2==1){
//         $tong=$tong+$i;
//     }

// }
// echo $tong;


// 4.Tính tổng số nguyên chan tử 1 -> n   

// $n=10;
// $tong=0;
// for($i=0;$i<=$n;$i=$i+2){
    
//     $tong=$tong+$i;
    

// }
// echo $tong;


// 5.tinh S = 1! + 2! + 3! + ... + n! 
// $n=5;
// $tong=0;
// $i=1;
// while($i<=$n){
//     $j=1;
//     $gt=1;
//     while($j<=$i){
//         $gt=$gt*$j;
//     }
//     $tong=$tong+$gt;
// }
// echo $tong;


// 6. Kiểm tra một số có phải là số nguyên tố hay không (sử dụng vòng lặp while)
// $n=7;
// $dem=0;
// for($i=1; $i<=$n;$i++){
//     if($n%$i==0){
//         $dem++;
//     }
// }
// if($dem==2){
//     echo $n.' la so nguyen to';
// }
// else echo $n.'hk la so nguyen to';



//  7. In ra tất cả số nguyên tố nhỏ hơn n (sử dụng vòng lặp for)


// function ktsnt ($n){
//     $dem=0;
//     for($i=1; $i<=$n;$i++){
//         if($n%$i==0){
//             $dem++;
//         }
//     }
//     if($dem==2){
//         return true;
//     }else{
//         return false;
//     }
    
// }

// $a=10;
// for($i=1;$i<=$a;$i++){
//     if(ktsnt($i)==true){
//         echo $i;
//     }
// }


// 8.Vẽ tam giác cân
// $n=5;
// for ($i = 1; $i <= $n; $i++) {
//     for ($j = $i; $j < 5; $j++) {
//         echo "0";
//     }

//     for ($j = 1; $j <= (2 * $i - 1); $j++) {
//         echo "1";
//     }

//     echo "<br>";
// }




// 9. Bài tập in bảng cửu chương bằng vòng lặp for

// for($i = 1; $i < 10; $i ++) {
//     for($j = 1; $j <= 10; $j ++) {
//         echo "$i x $j = " . ($i * $j);
//         echo "<br>";
//     }
//     echo "<br>";
// }




//  10. Bài toán tính tiền taxi với số km cho trước 
// *         + 1km đầu giá = 15000 đ 
//  *         + từ 1km đến 5km giá = 12000 đ 
//  *         + từ 6km trở đi giá  = 90000 đ
//  *         + từ 140km trở đi được giảm 12 % tổng tiền



function taxi($n){
    $tong=1;
    if($n>=140){
        $tong=$n*9000-($n*9000*0.12);
    }
    else if($n>=6){
        $tong= $n*9000;
    }
    else if($n>=5){
        $tong= $n*12000;
    }
    else{
        $tong= $n*15000;
    }
    return $tong;
}

$n=140;
echo taxi($n);

?>