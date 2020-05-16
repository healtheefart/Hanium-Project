
<?php

include('admin/connect_db.php');

if(isset($_GET['no'])){

    $filterednumber = mysqli_real_escape_string($conn, $_GET['no']);

    $sql = "select * from board where no={$filterednumber}";
    $result = mysqli_query($conn,$sql);

    $rows = mysqli_fetch_assoc($result);
    $title = $rows['title'];
    $content = $rows['content'];

}else{
  echo "<script>history.back(alert('잘못된 접근입니다'))</script>;";
};
include('header.php');
?>
<style>
<?php
include('css/boardmodify.css');
?>
</style>
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
    			<form method="get" action="modify_process.php">
    				<table class="table table-striped"
    					style="text-align: center; border: 1px solid #dddddd">
    					<thead>
    						<tr>
    							<th colspan="2" style="background-color: #eeeeee; text-align: center; font-size: 16px; letter-spacing: 0.8em; color:#495057;">공지사항 수정</th>
    						</tr>
    					</thead>
    					<tbody>

    						<tr>
    							<td><input type="text" class="form-control" name="title" value="<?=$title?>" maxlength="50"/></td>
    						</tr>
    						<tr>
    							<td><textarea class="form-control" name="content" maxlength="2048" style="height: 350px;"><?=$content?></textarea></td>
    						</tr>
    					</tbody>
    				</table>
             <input type="hidden" name="number" value="<?=$filterednumber?>">
    				<input type="submit" class="btn btn-primary pull-right" value="글 수정" />
    			</form>
    		</div>
    	</div>
    </div>
  </article>

<?php
include('footer.php');

?>
