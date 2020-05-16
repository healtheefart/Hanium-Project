<?php
include('header.php');
if(isset($_SESSION['inputId'])) {
  echo "<script>location.href='index.php';</script>";
}
?>
  <article class="registerpage">
    <div class="container">
      <div class="bread">
        <ol>
          <li><a href="#">도움말</a></li>
          <li><a href="account.php">계정 생성/삭제</a></li>
          <li><a href="register.php">계정 생성</a></li>
        </ol>
      </div>
    </div>
      <div class="makeaccount-text">
        <h1>계정생성</h1>
      </div>
      <form action="add_db.php" name="user_form" method="post" onsubmit="chk_input()">
      <div class="register-box">
        <div class="info-input">
          <p>이름:</p>
          <input type="text" name="inputName" class="form-control" id="inputName" placeholder="이름을 입력해주세요">
          <div class="register-msg"><span name="chkName" id="chkName" ></span></div>
          <p>이메일 주소:</p>
          <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="이메일을 입력해주세요">
          <div class="register-msg"><span name="chkemail" id="chkemail" ></span></div>
          <p>핸드폰 번호:</p>
          <input type="tel" name="inputPhn" class="form-control" id="inputMobile" placeholder="'-'를 포함하여 휴대폰 번호를 입력해주세요">
          <div class="register-msg"><span name="chkPhn" id="chkPhn"></span></div>
          <p>아이디:</p>
          <input type="text" name="inputId" class="form-control" id="inputId" placeholder="아이디를 입력해주세요">
          <div class="register-msg" ><span name="chkId" id="chkId"></span></div>
          <p>비밀번호:</p>
          <input type="password" name="inputPw" class="form-control" id="inputPassword" placeholder="비밀번호를 입력해주세요">
          <div class="register-msg"><span id="chkPw" ></span></div>
          <p>비밀번호 확인:</p>
          <input type="password" name="inputPwchk" class="form-control" id="inputPasswordCheck" placeholder="비밀번호 확인을 위해 다시 한 번 입력해주세요">
          <div class="register-msg"><span id="rechkPw"></span></div>
        </div>
        <div class="agreement">
          <div class="pre-scroller">
            <p>1. 개인정보 수집항목
              <br>아이디, 비밀번호, 이름, 휴대폰 번호, 이메일</p>
            <p>2. 수집 기간
              <br>회원 탈퇴 시까지</p>
            <p>3. 수집 목적
              <br>고객 유형별 데이터 분석, 고객 맞춤형 서비스 제공</p>
          </div>
          <div class="check">
            <label class="checkbox-inline" for="inlineCheckbox">
              <input type="checkbox" id="inlineCheckbox" name="inlineCheckbox" value="agree">
              원활한 서비스 이용을 위해 개인정보 수집에 동의해주세요
            </label>
          </div>
        </div>
        <div class="register-button">
          <input type="submit" value="계정 생성하기">
        </div>
      </div>
    </form>
<script>


  $(document).ready(function(){
//이름 누락 체크 시작
  $('#inputName').blur(function(){
  var inputName= $(this).val();

  $.ajax({
    url:"chkName.php",
    method:"POST",
    data:{inputName:inputName},
    dataType:"text",
    success:function(msg){
        $('#chkName').html(msg);
    }
  } )
});
//이름 누락 체크 끝

//이메일 중복/누락/정규표현식/누락 체크 시작
$('#inputEmail').blur(function(){
  var inputEmail= $(this).val();
  var regEmail=/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;
  var regEmailchk=regEmail.test(inputEmail);
  var regEmail=regEmailchk?1:0;

  $.ajax({
    url:"chkemail.php",
    method:"POST",
    data:{inputEmail:inputEmail,
          regEmail:regEmail},
    dataType:"text",
    success:function(msg){
      if(msg=="사용 가능한 이메일입니다"){
      $('#chkemail').css("color","#458D2A");
      $('#chkemail').html(msg);
    }else{
        $('#chkemail').css("color","#B9062F");
        $('#chkemail').html(msg);
    }
    }} );
} );
//이메일 중복/누락/정규표현식 끝

//휴대폰번호 정규표현식/누락 체크 시작

$('#inputMobile').blur(function(){
  var inputMobile= $(this).val();
  var regPhn=/^[0-9]{3}[-]+[0-9]{4}[-]+[0-9]{4}$/;
  var regPhnchk=regPhn.test(inputMobile);
  var regPhn=regPhnchk?1:0;

  $.ajax({
    url:"chkPhn.php",
    method:"POST",
    data:{inputMobile:inputMobile,
          regPhn:regPhn},
    dataType:"text",
    success:function(msg){
      if(msg=="사용 가능한 휴대폰번호입니다"){
      $('#chkPhn').css("color","#458D2A");
      $('#chkPhn').html(msg);
    }else{
        $('#chkPhn').css("color","#B9062F");
        $('#chkPhn').html(msg);
    }
    }} );
} );
//휴대폰번호 정규표현식/누락 체크 끝

//아이디 정규표현식/중복/누락 체크 시작
    $('#inputId').blur(function(){
      var inputId= $(this).val();
      var regId=/^[A-za-z0-9]{5,15}/g;
      var regIdchk=regId.test(inputId);
      var regId=regIdchk?1:0;

      $.ajax({
        url:"chkId.php",
        method:"POST",
        data:{inputId:inputId,
              regId:regId},
        dataType:"text",
        success:function(msg){
          if(msg=="사용 가능한 아이디입니다"){
          $('#chkId').css("color","#458D2A");
          $('#chkId').html(msg);
        }else{
            $('#chkId').css("color","#B9062F");
            $('#chkId').html(msg);
        }
        }} );
    } );
//아이디 중복체크 끝

//비밀번호 정규표현식/누락 시작
$('#inputPassword').blur(function(){
  var inputPassword= $(this).val();
  var regPw=/^[A-Za-z0-9]{6,12}/;
  var regPwchk=regPw.test(inputPassword);
  var regPw=regPwchk?1:0;

  $.ajax({
    url:"chkPw.php",
    method:"POST",
    data:{inputPassword:inputPassword,
          regPw:regPw},
    dataType:"text",
    success:function(msg){
      if(msg=="사용 가능한 비밀번호입니다"){
      $('#chkPw').css("color","#458D2A");
      $('#chkPw').html(msg);
    }else{
        $('#chkPw').css("color","#B9062F");
        $('#chkPw').html(msg);
    }
    }} );
} );
//비밀번호 정규표현식/누락 끝

//비밀번호확인 누락/일치여부 시작
$('#inputPasswordCheck').blur(function(){
  var inputPasswordCheck= $(this).val();
  var inputPassword= $('#inputPassword').val();
  var rechkPw='';
  if(inputPasswordCheck!=inputPassword){
       rechkPw=0;
  }else{
       rechkPw=1;
  }

  $.ajax({
    url:"rechkPw.php",
    method:"POST",
    data:{inputPasswordCheck:inputPasswordCheck,
          rechkPw:rechkPw},
    dataType:"text",
    success:function(msg){
      if(msg=="비밀번호 확인이 일치합니다"){
      $('#rechkPw').css("color","#458D2A");
      $('#rechkPw').html(msg);
    }else{
        $('#rechkPw').css("color","#B9062F");
        $('#rechkPw').html(msg);
    }
    }} );
} );
//비밀번호확인 누락/일치여부 시작


  });
</script>

  </article>
  <?php
  include('footer.php');
   ?>
