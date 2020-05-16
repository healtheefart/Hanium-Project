<?php
include('admin/connect_db.php');

if(isset($_POST['inputEmail']) && $_POST['inputEmail']!=''){ //id 값이 입력되고 빈칸이 아니면
  $inputEmail=mysqli_real_escape_string($conn,$_POST['inputEmail']); //id 값 받아옴
  $regEmail=mysqli_real_escape_string($conn,$_POST['regEmail']);
  $sql="select * from account where email='{$inputEmail}'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($result); // sql qeury to check duplication
  if(!$regEmail){
    echo "이메일 형식에 맞게 입력하세요";
  }else if($row){
    echo "이미 사용 중인 이메일입니다";
  }else if(!$row){
      echo "사용 가능한 이메일입니다";
  } }
  else{
  echo "필수사항을 입력해주세요";
  }

 ?>
