<?php
include('admin/connect_db.php');

if(isset($_POST['inputMobile']) && $_POST['inputMobile']!=''){ //id 값이 입력되고 빈칸이 아니면
  $inputMobile=mysqli_real_escape_string($conn,$_POST['inputMobile']); //id 값 받아옴
  $regPhn=mysqli_real_escape_string($conn,$_POST['regPhn']);

  if(!$regPhn){
    echo "입력 형식에 맞게 입력해주세요";
  }
  else if($regPhn){
      echo "사용 가능한 휴대폰번호입니다";
  } }
  else{
  echo "필수사항을 입력해주세요";
  }

 ?>
