<?php
include('admin/connect_db.php');

if(isset($_POST['inputId']) && $_POST['inputId']!=''){ //id 값이 입력되고 빈칸이 아니면
  $inputId=mysqli_real_escape_string($conn,$_POST['inputId']); //id 값 받아옴
  $regId=mysqli_real_escape_string($conn,$_POST['regId']);
  $sql="select * from account where id='{$inputId}'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($result); // sql qeury to check duplication
  if(!$regId){
    echo "영문 대소문자 및 숫자를 조합한 5~15자를 입력하세요";
  }else if($row){
    echo "이미 사용 중인 아이디입니다";
  }else if(!$row){
      echo "사용 가능한 아이디입니다";
  } }
  else{
  echo "필수사항을 입력해주세요";
  }

 ?>
