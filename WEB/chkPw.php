<?php
include('admin/connect_db.php');

if(isset($_POST['inputPassword']) && $_POST['inputPassword']!=''){ //id 값이 입력되고 빈칸이 아니면
  $inputPassword=mysqli_real_escape_string($conn,$_POST['inputPassword']); //id 값 받아옴
  $regPw=mysqli_real_escape_string($conn,$_POST['regPw']);
  if(!$regPw){
    echo "영문 대소문자 및 숫자를 조합한 6~15자를 입력하세요";
  }else if($regPw) {
      echo "사용 가능한 비밀번호입니다";
  }}else{
  echo "필수사항을 입력해주세요";
}

 ?>
