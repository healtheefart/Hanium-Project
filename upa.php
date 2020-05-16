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
      
      <h2>울산항만공사 보고서</h2>
      <?php 
      system("cd");
      system("cd /arachni-1.5.1-0.5.12/bin");
      system("echo 웹사이트 보안 취약점 진단 시작 -- 약 5분 소요 예상");
      echo "<br>";
      system("./arachni --http-request-concurrency=10 http://13.125.213.252/www.upa.or.kr/main.html --report-save-path=analysis/report.afr");
      system("./arachni_reporter /analysis/report.atr --reporter=html:outfile=report/report_html.zip");
      system("unzip report_html.zip");
      include('/arachni-1.5.1-0.5.12/bin/report_html/index.html');
      ?>
    <a href="my_report/index.html"><h3>보고서 출력</h3></a>
    </div>
  </article>
  <?php
    include('footer.php');
   ?>
