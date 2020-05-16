<?php
  include ('admin/connect_db.php');

  $inputName=mysqli_real_escape_string($conn,$_POST['inputName']);
  $inputEmail=mysqli_real_escape_string($conn,$_POST['inputEmail']);
  $inputPhn=mysqli_real_escape_string($conn,$_POST['inputPhn']);
  $inputId=mysqli_real_escape_string($conn,$_POST['inputId']);
  $inputPw=mysqli_real_escape_string($conn,$_POST['inputPw']);
  $inputPwchk=mysqli_real_escape_string($conn,$_POST['inputPwchk']);
  $userip=mysqli_real_escape_string($conn,$_SERVER['REMOTE_ADDR']);
  if(isset($_POST['inlineCheckbox'])){
    $inlineCheckbox=mysqli_real_escape_string($conn,$_POST['inlineCheckbox']);
  }else $inlineCheckbox="";
  $hash = password_hash($inputPw, PASSWORD_DEFAULT);

  if($inputName=="" ||$inputEmail=="" || $inputPhn=="" || $inputId==""|| $inputPw==""|| $inputPwchk=="" || $inputPwchk=="" ){
      echo "<script>alert('필수 사항을 입력해주세요');history.back();</script>";
      die;
  }else if($inlineCheckbox==""){
    echo "<script>alert('개인정보 수집에 동희해주세요');history.back();</script>";
    die;
  }

  mysqli_query($conn, "set sesseion character_set_connection=utf8;");
  mysqli_query($conn, "set sesseion character_set_results=utf8;");
  mysqli_query($conn, "set sesseion character_set_client=utf8;");


  $sql="select count(*) from account where id='$inputId'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
  $num=$row[0];

  if($num==0){
        $sql="insert into account(name, email, phoneNum, id, pw, date, userip)
        values('{$inputName}','{$inputEmail}','{$inputPhn}','{$inputId}','{$hash}',now(),'{$userip}')";
        $result=mysqli_query($conn,$sql);

       if($result){
              echo "<script>alert('회원가입을 환영합니다');
                    window.location.href='login.php';
                    </script>";
            }else{
              echo "<script>alert('회원가입을 다시 시도해주세요');
                    history.back();
                    </script>";
        }
      }
  else{

      echo "<script>alert('이미 존재하는 아이디입니다.\\r\\n 회원가입을 다시 시도해주세요');
            history.back();
            </script>";
 }
  mysqli_close($conn);

 ?>
