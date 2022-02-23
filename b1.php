<?php 

// bai1
//  for ($i =1; $i <= 100 ; $i++ ){ 
//      if($i%3==0 && $i%5==0){
//          echo "FizzBuzz";  
        
//     }
//      else if($i%3==0){
//             echo "Fizz";    
//         }  
//      else if($i%5==0){
//             echo "Buzz";    
//         }  
    
    
//          echo $i."\t";
//  }

//  2.	Nhập một sâu ký tự. Đếm số từ của sâu đó 
//  (mỗi từ cách nhau bởi một khoảng trắng có thể là một hoặc nhiều dấu cách, tab, xuống dòng).
//   Ví dụ ” hoc php co ban den nang cao ” có 7 từ.


// $a =  'hoc php co ban den nang cao';

// echo str_word_count($a);



//3.	Nhập 2 sâu ký tự s1 và s2.Kiểm tra xem sâu s1 có chứa s2 không ?.
// $a1 = 'abcdefgh';
// $a2 = 'abcde';

// $a = strpos($a1, $a2);
// if ($a !== false) {
//     echo 'sau 1 co trong sau 2';
// } else {
//     echo 'sau 1 hk co trong sau 2';
// }


// 4.	Nhập vào 1 chuỗi và tính độ dài của một chuỗi

// $a =  'hoc php co ban den nang cao';
// echo strlen($a);

// 5.	Nhập vào 1 chuỗi và  Đảo ngược chuỗi

// $a =  'hoc php co ban den nang cao';
// echo strrev($a);

// 6.	Nhập vào 1 chuối và tìm kiếm 1 chuỗi “test” trong chuỗi đã nhập

//  $a1 = 'abcdefgh wqd';
//  $a2 = 'abcde';

// $a = strpos($a1, $a2);
// if ($a !== false) {
//     echo 'chuoi 2 co trong chuoi 1';
// } else {
//     echo 'chuoi 2 hk co trong chuoi 1';
// }


// 7.	Thay thế văn bản trong một chuỗi

//$a = 'hoc php co ban den nang cao';
// $a = str_replace( 'hoc php', 'hoc .net', $a );
// echo $a;


// 8.	Chuyển đổi chữ hoa, chữ thường
// echo strtoupper($a);



// 9.	Tạo 1 mảng và chuyển đổi mảng đã tạo thành kiểu chuỗi

// $a = array(
//     'ho'=>'le',
//     'ten'=>'nghia'
// );
//  $hoten = implode('',$a);
//  echo $hoten;




// 10.	Cho 1 mảng array(‘0’,’1’,’2’,’3’,’4’).
//  Đếm độ dài của mảng.Xóa phần tử đầu tiền và thứ 3 trong mảng.
//   Sau khi xóa hãy chèn giá trị “số 3” vào mảng trên.

//  $a = array('0','1','2','3','4');


// echo count($a);
// array_shift ($a);
// unset($a[3]);

// $a[]='3';


// for($i=0;$i<=count($a);$i++){
//     echo $a[$i].'<br />';
// }



// Cho mảng array("Hoang"=>"31","Nam"=>"41","Minh"=>"39","Hoa"=>"40")
// Hãy sắp xếp mảng theo giá trị tăng dần, hiển thị tuổi nhỏ nhất và lớn nhất theo tên.

$a= array("Hoang"=>"31","Nam"=>"41","Minh"=>"39","Hoa"=>"40");

// sort($a);

// for($i=0; $i<=count($a);$i++){
//     echo  $a[$i].'<br />';
//    
// }


$max=$a['Hoang'];
$tenmax='';
foreach ($a as $key=> $val){
    if($a[$key]>=$max){
        $max=$a[$key];
        $tenmax = $key;
    }
}
echo 'tuoi lon nhat'.$tenmax.'</br>';


$min=$a['Hoang'];
$tenmin='';
foreach ($a as $key=> $val){
    if($a[$key]<=$max){
        $min=$a[$key];
        $tenmin = $key;
    }
}
echo 'tuoi lon nhat'.$tenmin;


?>