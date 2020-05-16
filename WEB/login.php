<?php
include('header.php');
if(isset($_SESSION['inputId'])) {
  echo "<script>location.href='index.php';</script>";
}
 ?>

  <article class="LOGIN">
    <div class="container">
      <div class="bread">
        <ol>
          <li><a href="login.php">LOGIN</a></li>
        </ol>
      </div>
      <form name="login_form" action="login_process.php" method="POST">

      <div class="login-container">
        <h1>LOGIN</h1>
        <div class="id">
          <div class="id-icon">
            <span class="fas fa-portrait"></span>
          </div>
          <div class="id-input">
            <input type="text" class="form-control input-lg" name="inputId" id="inputId" placeholder="아이디">
          </div>
        </div>

        <div class="pw">
          <div class="pw-icon">
            <span class="fas fa-key"></span>
          </div>
          <div class="pw-input">
            <input type="password" name="inputPw" id="inputPw" class="form-control input-lg" placeholder="비밀번호">
          </div>
        </div>
        <div class="login-button">
          <input type="submit" value="로그인">
        </div>
        <div class="register-find">
          <p>계정이 없으신가요?<a href="register.php">계정 만들기</a></p>
        </div>
      </div>
    </form>
  </div>
  </article>
  <?php
  include('footer.php');
   ?>
