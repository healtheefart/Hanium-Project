<?php
include('admin/connect_db.php');

if(isset($_POST['inputName']) && $_POST['inputName']==''){
  echo "필수사항을 입력해주세요";
  }

 ?>
