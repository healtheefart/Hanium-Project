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
          <li><a href="webdiagnose.php">웹사이트</a></li>
        </ol>
      </div>
      <h1>웹사이트 진단</h1>
      <p>웹사이트의 보안 취약점을 보기 쉬운 보고서 형태로 진단하여 보여준다.</p>
      
      <h2>점검할 사이트 목록</h2>
      <h3><li><span>울산항만공사&nbsp; &nbsp;</span><span><a href="upa.php"><img src = "img/diagnose.png" width = 30></a><a href="http://13.125.213.252/www.upa.or.kr/main.html"><img src = "img/visit.png" width = 30></a></span></li></h3>
      <h3><li><span>울산항만공사 재난안전&nbsp; &nbsp;</span><span><a href="safe_upa.php"><img src = "img/diagnose.png" width = 30></a><a href="http://13.125.213.252/safe.upa.or.kr/index.html"><img src = "img/visit.png" width = 30></a></span></li></h3>
      <h3><li><span>항계안전 해양정보 제공 시스템&nbsp; &nbsp;</span><span><a href="khos_upa.php"><img src = "img/diagnose.png" width = 30></a><a href="http://13.125.213.252/www.khoa.go.kr/pois/pois4daf.html"><img src = "img/visit.png" width = 30></a></span></li></h3>
      <h3><li><span>울산항일자리정보센터&nbsp; &nbsp;</span><span><a href="job_upa.php"><img src = "img/diagnose.png" width = 30></a><a href="http://13.125.213.252/job.upa.or.kr/index.html"><img src = "img/visit.png" width = 30></a></span></li></h3>
    </div>
  </article>
  <?php
  include('footer.php');
   ?>
