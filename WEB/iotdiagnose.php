<?php
include('header.php');
if(!isset($_SESSION['inputId'])) {
  echo "<script>alert('로그인 후 이용하세요');
        location.href='login.php';</script>";
}

 ?>
  <article class="post">
    <div class="container">
      <div class="bread">
        <ol>
          <li><a href="#">진단하기</a></li>
          <li><a href="webdiagnose.php">IoT</a></li>
        </ol>
      </div>
      <h1>IoT 진단</h1>
      <p>IoT의 보안 취약점을 보기 쉬운 보고서 형태로 진단하여 보여준다.</p>
    </div>
  </article>
  <?php
  include('footer.php');
   ?>
