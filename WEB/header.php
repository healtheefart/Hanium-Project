<?php
  session_start();
  $inout='<li><a href="login.php">LOGIN</a></li>';
  if(isset($_SESSION['inputId'])){
    $inout='<li><a href="logout.php">LOGOUT</a></li>';
  }
  $account='<li><a href="account.php">계정 생성</a></li>';
  if(isset($_SESSION['inputId'])){
    $account='<li><a href="account.php">계정 삭제</a></li>';
  }
 ?>
<!DOCTYPE html>
<html lang = "ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/8f3081df2a.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script>$(function(){
    $(".headC").click(function(){
      $(".headB").slideToggle();
      });
    });
  </script>

  <title>SEAKER</title>

<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Saira+Stencil+One|Song+Myung&display=swap" rel="stylesheet">
</head>

<style>
  .sr-only {
    position: absolute;
    width: 1px;
    padding: 0;
    margin:-1px;
    overflow: hidden;
    clip: rect(0,0,0,0);
    border: 0;
  }
</style>

<body class="nohero">
  <header class="head-fixed">
    <div class="container">
      <div class="container-small">
        <a href="index.php" class="headA">SEAKER</a>
        <button type="button" class="headC">
          <span class="fas fa-bars" title="MENU"></span>
        </button>
      </div>
      <nav class="headB">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <?=$inout?>
          <li><a href="about.php" id="current">ABOUT</a>
            <ul>
              <li><a href="about.php">목표/기대효과</a></li>
            </ul></li>
          <li><a href="#">진단하기</a>
            <ul>
              <li><a href="webdiagnose.php">웹사이트</a></li>
              <li><a href="iotdiagnose.php">IoT</a></li>
            </ul></li>
          <li><a href="#">알림광장</a>
            <ul>
              <li><a href="board.php">공지사항</a></li>
              <li><a href="teaminfo.php">팀원 정보</a></li>
            </ul></li>
          <li><a href="#">도움말</a>
            <ul>
              <?=$account?>
              <li><a href="contact.php">문의</a></li>
            </ul></li>
        </ul>
      </nav>
    </div>
  </header>
