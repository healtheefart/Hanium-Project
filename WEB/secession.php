<?php
session_start();
include ('admin/connect_db.php');
if(isset($_SESSION['inputId'])){
  $seccesion=$_SESSION['inputId'];
            $sql="delete from account where id='{$seccesion}'";
            $result=mysqli_query($conn, $sql);
            session_destroy();
            echo "<script> history.back(alert('계정이 삭제되었습니다'))</script>";
}else{
  echo "<script> history.back(alert('잘못된 접근입니다'))</script>";
}

?>
