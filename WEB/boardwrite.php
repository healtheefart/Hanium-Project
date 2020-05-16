<?php
include('header.php');?>
<style>
<?php
include('css/boardwrite.css');
?>
</style>
<?php
if($_SESSION['inputId']!='admin'){
  echo "<script>location.href='index.php';</script>";
}
$author=$_SESSION['inputName'];
$author_num=$_SESSION['inputNo'];
?>

  <article class="post">
    <div class="container">
      <div class="bread">
        <ol>
          <li><a href="#">알림광장</a></li>
          <li><a href="board.php">공지사항</a></li>
        </ol>
      </div>
      <h1>공지사항</h1>
      <div class="container">
    		<div class="row">
    			<form action="write_process.php" method="POST" name="write_form" onsubmit="return input_chk()">
    				<table class="table table-striped"
    					style="text-align: center; border: 1px solid #dddddd">
    					<thead>
    						<tr>
    							<th colspan="2" style="background-color: #eeeeee; text-align: center; font-size: 16px; letter-spacing: 0.8em; color:#495057;">공지사항 작성</th>
    						</tr>
    					</thead>
    					<tbody>
    						<tr>
    							<td><input type="text" class="form-control" placeholder="글 제목" name="title" maxlength="50"/></td>
    						</tr>
    						<tr>
    							<td><textarea class="form-control" placeholder="글 내용" name="content" maxlength="2048" style="height: 350px;"></textarea></td>
    						</tr>

    						<input type="hidden" name="author" value="<?=$author?>">
                <input type="hidden" name="author_num" value="<?=$author_num?>">
    					</tbody>
    				</table>
    				<input type="submit" class="btn btn-primary pull-right" value="글 저장" />
            <script>
      function input_chk(){
        if(write_form.title.value==''){
          alert('제목을 입력해주세요');
          write_form.title.focus();
          return false;
        }
        else if(write_form.content.value==''){
          alert('내용을 입력해주세요');
          write_form.content.focus();
          return false;
      }else{
        return true;
      }
    }
    </script>
          </form>

    		</div>
    	</div>
    </div>
  </article>
<?php
include('footer.php');
 ?>
