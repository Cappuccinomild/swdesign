<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

//카테고리 이름 전달 받음
$cate_id=$_GET['cate_id'];

//페이지 수 전달 받을 때 전달받은것 없으면 1
if(isset($_GET['page'])){
  $page=$_GET['page'];
}
else {
  $page=1;
}
$db = new DBC;
$db->DBI();

//해당 카테고리의 상품 받음
$db->query = "SELECT COUNT(GoodsID) FROM item WHERE CategoryID = '".$cate_id."'";

$db->DBQ();

if($db->result){//값이 존재할 경우
   $data = $db->result->fetch_row();
   $MAX=$data[0];
}
else { //에러 체크
  echo "no";
}

$db->DBO();

//해당 페이지의 첫번째
$firstPageNum = ($page * 16) - 16 ;
$MAX = ceil($MAX/16) * 16;

$db = new DBC;

$db->DBI();

//첫번째부터 16개씩 끊어서 정보 받음
$db->query = "SELECT GoodsID, price, DesignerID, ItemName, thumb FROM item WHERE CategoryID = '".$cate_id."' ORDER BY GoodsID desc LIMIT $firstPageNum,16";
$db->DBQ();

if($db->result){
		$base->content="<p class='animated infinite pulse delay-2s' style='text-align: center;'>$cate_id</p>";
    $base->content .="<table style='margin-left: auto; margin-right: auto;'>";
        for($i = 0; $data = $db->result->fetch_row(); $i = $i + 1){
        	if($i == 0 || $i == 4 || $i == 8 || $i == 12) //한 줄에 4개 출력
        		$base->content .="<tr>";

            //링크를 클릭하면 해당 아이템 정보로 넘어감
           $base->content .="<td style='text-align: center; padding: 10px; height: 450px;'> <a href = './item.php?item_id=".$data[0]."'><img src='".$data[4]."' alt='".$data[3]."' title='".$data[3]."' id='itemimg' width='261px' height='341px' /></a><br/>
           <a href = './item.php?item_id=".$data[0]."'>".$data[3]."<br/></a>".$data[2]."<br/><b style='color: #bc3831;'>".$data[1]."원</b></td>";

           if($i == 3 || $i == 7 || $i == 11 || $i == 15)
             $base->content .= "</tr>";

        }

        $base->content .= "</table>";

        //하단 페이지 수 출력
      if($page > 1){
        $board_num = $page - 1;
        $base->content .="<a href = './index.php?page=".$board_num."'> 이전 ";

      }
      for($board_num = 1 ; $board_num <= $MAX/16 ; $board_num = $board_num+1){
          $base->content .="<a href = './index.php?page=".$board_num."'> ".$board_num. " ";
      }
      if($page < $MAX/16){
        $board_num = $page + 1;
        $base->content .="<a href = './index.php?page=".$board_num."'> 다음 ";
      }
}
else { //에러 체크
    $base->content="NO!!";
}

$db->DBO();

$base->LayoutMain();
?>
