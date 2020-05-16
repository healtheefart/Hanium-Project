<?php

  include ('admin/connect_db.php');

  $title=mysqli_real_escape_string($conn,$_POST['title']);
  $content=mysqli_real_escape_string($conn,$_POST['content']);
  $author=mysqli_real_escape_string($conn,$_POST['author']);
  $author_num=mysqli_real_escape_string($conn,$_POST['author_num']);
  $sql="insert into board (title, content, date, hit, account_no)
  values('{$title}','{$content}',now(),0,'{$author_num}')";
  $result = mysqli_query($conn,$sql);
  if($result){?>

     <script>
            alert("<?php echo "글이 등록되었습니다."?>");
                  location.replace("board.php");
    </script>
  <?php
            }else{
                  echo "다시 시도해주세요";
                  }
  mysqli_close($conn);
?>
