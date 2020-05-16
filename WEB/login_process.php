<?php
  include ('admin/connect_db.php');
  session_start();
  $inputId=mysqli_real_escape_string($conn,$_POST['inputId']);
  $inputPw=mysqli_real_escape_string($conn,$_POST['inputPw']);
  $sql="select * from account where id='$inputId'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
  $encrypto_pw=$row['pw'];
  $list=mysqli_num_rows($result);
  if(isset($list) && password_verify($inputPw,$encrypto_pw)){
      $_SESSION['inputId']=htmlspecialchars($row['id']);
      $_SESSION['inputName']=htmlspecialchars($row['name']);
      $_SESSION['inputNo']=htmlspecialchars($row['no']);
      echo "<script>
            location.href='index.php';</script>";
    }else {
        echo "<script>alert('아이디 또는 비밀번호가 틀립니다');
              history.back();
              </script>";

    }
?>
