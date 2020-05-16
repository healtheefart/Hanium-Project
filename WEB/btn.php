<div class="btninline">
<form class="btnstyle" method="get" name="send_modify" action="boardmodify.php">
  <input type="hidden" name="no" value=<?=$filteredno?>>
  <input type="submit" class="btn"  onclick=
  "if(!confirm('게시글을 수정하시겠습니까?')){
        return false;
  }"; value="수정">
</form>
</div>
<div class="btninline">
<form class="btnstyle" method="get" name="send_delete" action="delete_process.php">
  <input type="hidden" name="no" value=<?=$filteredno?>>
  <input type="submit" class="btn" onclick=
  "if(!confirm('게시글을 정말로 삭제하시겠습니까?')){
        return false;
  }"; value="삭제">
</form>
</div>
