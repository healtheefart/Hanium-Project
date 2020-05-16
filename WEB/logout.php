<?php
  session_start();

  if(isset($_SESSION['inputId'])){
    session_destroy();
    echo"<script>history.back();</script>";
  }else{
    echo"<script>history.back(alert('잘못된 접근입니다'));</script>";
  }
?>
