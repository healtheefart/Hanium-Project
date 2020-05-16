
<?php
include('header.php');?>
<style>
<?php
include('css/boardstyle.css');
?>
.table_auto {
				overflow-x: auto;
			}

td {
		padding: 20px;
	}
td{

		text-align:center;
    text-overflow: ellipsis;
    white-space: nowrap;
}


</style>
<?php
include('admin/connect_db.php');
$writebtn='';
if(isset($_SESSION['inputId']) && $_SESSION['inputId']=='admin') {
 $writebtn='<button type="button" class="tablemenu" name="write" onclick="location.href=\'boardwrite.php\'">글작성</button>';
}?>

  <article class="post">
    <div class="container">
      <div class="bread">
        <ol>
          <li><a href="#">알림광장</a></li>
          <li><a href="board.php">공지사항</a></li>
        </ol>
      </div>
      <h1>공지사항</h1>
      <div class="board-container">
        <?php
							//pagination
							$results_per_page = 5; //한 페이지에 표시할 data 목록 수
							$sql='SELECT * FROM board';
							$result = mysqli_query($conn, $sql);
							$number_of_results = mysqli_num_rows($result); // db의 데이타 목록 수
							$total=$number_of_results;

							$number_of_pages = ceil($number_of_results/$results_per_page); //전체 페이지 수 결정
							if (!isset($_GET['page'])) {
							  $page = 1;
							}
							else{
							  $page = $_GET['page'];
							}
							$total=$total-5*($page-1);
							$this_page_first_result = ($page-1)*$results_per_page;
							$sql='select account.no as no, board.no as bno, title, board.date, hit, name
                from board left join account on account.no =board.account_no order by bno desc
									 LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
							$result = mysqli_query($conn, $sql);


      ?>
    <div class="table_auto">
        <table width="800px">
          <colgroup>
              <col width="10%" />
              <col width="40%" />
              <col width="10%" />
              <col widht="20%" />
              <col width="10%" />
          </colgroup>
          <thead>
            <tr>
              <th>글번호</th>
              <th>글제목</th>
              <th>작성자</th>
              <th>작성일</th>
              <th>조회수</th>
            </tr>
          </thead>
          <tbody>

            <?php

                while($num=mysqli_fetch_assoc($result)){

                  $list=array(
                      'no'=> htmlspecialchars($num['no']),
                      'title'=>htmlspecialchars($num['title']),
                      'date'=>htmlspecialchars($num['date']),
                      'hit'=>htmlspecialchars($num['hit']),
                      'name'=>htmlspecialchars($num['name']),
                      'bno'=> htmlspecialchars($num['bno'])
                  );
              ?>
            		<tr>

                <td ><?=$total?></td>
                <td style="text-align:left;" class="titlelist">
                <a href = "boardview.php?no=<?=$list['bno']?>">
                <?=$list['title']?></td>
								<td ><?=$list['name']?></td>
                <td ><?=$list['date']?></td>
                <td ><?=$list['hit']?></td>

                </tr>
        <?php
                $total--;
                }
        ?>

          </tbody>
          <tfoot class="pagination">

            <tr>
              <td colspan="5" class="tdFoot">
							<?php
									if($page!=1){
										$page-=1;
									}
									echo '<a class="previous" href="board.php?page='.$page.'" >[Previous]</a>';

									for ($page=1;$page<=$number_of_pages;$page++) {
							  	echo '<a href="board.php?page=' . $page . '">' . $page . '</a> ';
									}
									if (!isset($_GET['page'])) {
									  $page = 1;
									}
									else{
									  $page = $_GET['page'];
									}									
									if($page==$number_of_pages){
										$page=$number_of_pages;
									}else{
										$page++;
									}
									echo '<a class="next" href="board.php?page='.$page.'">[Next]</a>';
								?>
            </tr>
          </tfoot>
        </table>
      </div>
        <div class="tablemenu">
          <?=$writebtn?>
        </div>
      </div>

  </article>
<?php
include('footer.php');
 ?>
