<?php
    include ('admin/connect_db.php');
      if(isset($_GET['number'])){
    $number=mysqli_real_escape_string($conn,$_GET['number']);
    $title=mysqli_real_escape_string($conn, $_GET['title']);
    $content=mysqli_real_escape_string($conn,$_GET['content']);
    $date=date('Y-m-d');
    $sql="update board set title='$title', content='$content', date='$date' where no='$number'";
    $result=mysqli_query($conn, $sql);
  }else{
    echo "<script>alert('잘못된 접근입니다');</script>";
  }
    if($result) {
?>
        <script>
            alert("수정되었습니다.");
            location.href="board.php";
        </script>
<?php    }
    else {
        echo "<script>alert('다시 시도해 주세요');</script>";
    }
?>
