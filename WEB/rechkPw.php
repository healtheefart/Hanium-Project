<?php
include('admin/connect_db.php');

if(isset($_POST['inputPasswordCheck']) && $_POST['inputPasswordCheck']!=''){ //id 값이 입력되고 빈칸이 아니면
  $inputPasswordCheck=mysqli_real_escape_string($conn,$_POST['inputPasswordCheck']);
  $rechkPw=mysqli_real_escape_string($conn,$_POST['rechkPw']); //id 값 받아옴


  if($rechkPw==0){
    echo "비밀번호 확인이 일치하지 않습니다";
  }else if($rechkPw==1) {
      echo "비밀번호 확인이 일치합니다";
  }}else{
  echo "필수사항을 입력해주세요";
}

 ?>
