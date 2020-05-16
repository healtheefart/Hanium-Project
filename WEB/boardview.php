
<?php
include('admin/connect_db.php');
if(empty(mysqli_real_escape_string($conn,$_GET['no']))) {
  header('Location:board.php');
};
include('header.php');

      $number = mysqli_real_escape_string($conn,$_GET['no']);
      $sql = "select board.no as no, title, board.date, content, account.name
          from board left join account on account.no=board.account_no where board.no=$number";
      $result = mysqli_query($conn, $sql);

      $row = mysqli_fetch_assoc($result);

                $filteredno=htmlspecialchars($row['no']);
                $filtered=array(
                  'title'=>htmlspecialchars($row['title']),
                  'content'=>htmlspecialchars($row['content']),
                  'date'=>htmlspecialchars($row['date']),
                  'name'=>htmlspecialchars($row['name'])
                );
      $hit = "update board set hit=hit+1 where no='{$filteredno}'";
      $result=mysqli_query($conn,$hit);
?>
<style>
<?php
include('css/boardview.css');
?>

.table_auto {
				overflow-x: auto;
			}
table {
				width: 100%;
				min-width: 500px;
			}
	td{
    text-overflow: ellipsis;

}
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
    <div class="table_auto">
    		<div class="row" style="width:100%">
    				<table class="table table-striped"
    					style="text-align: center; border: 1px solid #dddddd; width:100%">
    					<thead >
    						<tr>
    							<th colspan="4" style=" text-align: center; font-size: 16px; letter-spacing: 0.8em; color:#495057;">공지사항</th>
    						</tr>
    					</thead>
    					<tbody>

    						<tr>
    							<td colspan="1" style="background-color: #eeeeee;">작성자</td>
    							<td colspan="1" style="text-align:left">
                    <?=$filtered['name']?>
                  </td>

    							<td colspan="1" style="background-color: #eeeeee;">작성일</td>
    							<td colspan="1" style="text-align:left" >
                    <?=$filtered['date']?>
                </td>
    						</tr>

                  <tr>
                    <td colspan="1" style="background-color: #eeeeee;"> 글 제목 </td>
                    <td colspan="3" style="text-align:left">
                      <?=$filtered['title']?>
                    </td>
                  </tr>

                  <tr>

    							<td  colspan="4" height="300" style="vertical-align: top; text-align:left; padding:1em">

                    <pre ><?=$filtered['content']?></pre>
                  </td>

    						</tr>
    					</tbody>
    				</table>
            </div>
            <div class="btninline">
            <input type="submit" class="btn btn-primary" onclick="location.href='board.php'" value="목록">
            </div>
            <?php

                if(isset($_SESSION['inputId']) && $_SESSION['inputId']==='admin'){
                  include('btn.php');
                }
            ?>



    	</div>
    </div>
  </article>
  <?php
  include('footer.php');?>
