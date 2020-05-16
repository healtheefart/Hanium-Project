<?php

  include ('admin/connect_db.php');
  if(isset($_GET['no'])){
    $number=mysqli_real_escape_string($conn, $_GET['no']);
    $sql="delete from board where no ={$number}";

    $result=mysqli_query($conn,$sql);
    echo "<script>alert('게시글 삭제 완료');location.href='board.php';</script>";
  }else{
      echo "<script>history.back(alert('잘못된 접근입니다'))</script>;";
    };
?>
