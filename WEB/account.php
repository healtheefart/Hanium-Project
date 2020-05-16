<?php
  include('header.php');
  $account_cmt="<li><a href='#'>계정 생성</a></li>
                </ol>
                </div><h1>계정 생성</h1>
                <p>'계정 생성'을 통해 계정을 새로 만들 수 있습니다</p>";
  $mkdel='<div class="account">
    <a href="register.php"><span class="fas fa-user-alt"></span></a>
    <h3><a href="register.php">계정 생성</a></h3>
    </div>';

  if(isset($_SESSION['inputId'])){
    $account_cmt="<li><a href='#'>계정 삭제</a></li>
                  </ol>
                  </div><h1>계정 삭제</h1>
                  <p>'계정 삭제'를 통해 계정을 삭제할 수 있습니다</p>";
    $mkdel='<div class="account">
      <a onclick="if(!confirm(\'정말로 삭제하시겠습니까?\')){
                      location.replace(\'account.php\');
                    }
                  else{
                      location.replace(\'secession.php\');
                    };">
      <span class="fas fa-user-slash"></span></a>
      <h3><a href="#">계정 삭제</a></h3>
    </div>';
  }

 ?>
  <article class="post">
    <div class="container">
      <div class="bread">
        <ol>
          <li><a href="#">도움말</a></li>
          <?=$account_cmt?>
          <div class="account-wrap">
          <?=$mkdel?>

      </div>
    </div>
  </article>
<?php
  include('footer.php');
?>
