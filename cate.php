<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$cate_id=$_GET['cate_id'];
if(isset($_GET['page'])){
  $page=$_GET['page'];
}
else {
  $page=1;
}
$db = new DBC;
$db->DBI();

//get max size
$db->query = "SELECT COUNT(GoodsID) FROM item WHERE CategoryID = '".$cate_id."'";

$db->DBQ();

if($db->result){//값이 존재할 경우
   $data = $db->result->fetch_row();
   $MAX=$data[0];
}
else {
  echo "no";
}

$db->DBO();

$firstPageNum = ($page * 16) - 16 ;
$MAX = ceil($MAX/16) * 16;

$db = new DBC;

$db->DBI();

$db->query = "SELECT GoodsID, price, DesignerID, ItemName, thumb FROM item WHERE CategoryID = '".$cate_id."' ORDER BY GoodsID desc LIMIT $firstPageNum,16";
$db->DBQ();

if($db->result){
		/*while($data = $db->result->fetch_row()){//링크를 클릭하면 newbook.html로 이동
			$base->content .=
      "<td style='margin-left: 20px; margin-right: 20px;'> <a href = './item.php?item_id=".$data[0]."'><img src='".$data[4]."' alt='".$data[1]."' title='".$data[1]."' id='itemimg' width='200px' height='200px' /></a><br/>
      <a href = './item.php?item_id=".$data[0]."'>상품명 : ".$data[1]."<br/></a>디자이너 : ".$data[3]."<br/>가격 : ".$data[2]." </td>";
		}
		"</tr> </table>";*/

	$base->content="<p class='animated infinite pulse delay-2s' style='text-align: center;'>$cate_id</p>";
    $base->content .="<table style='margin-left: auto; margin-right: auto;'>";
        for($i = 0; $data = $db->result->fetch_row(); $i = $i + 1){//링크를 클릭하면 newbook.html로 이동
        	if($i == 0 || $i == 4 || $i == 8 || $i == 12)
        		$base->content .="<tr>";

           $base->content .="<td style='text-align: center; padding: 10px; height: 450px;'> <a href = './item.php?item_id=".$data[0]."'><img src='".$data[4]."' alt='".$data[3]."' title='".$data[3]."' id='itemimg' width='261px' height='341px' /></a><br/>
           <a href = './item.php?item_id=".$data[0]."'>".$data[3]."<br/></a>".$data[2]."<br/><b style='color: #bc3831;'>".$data[1]."원</b></td>";

           if($i == 3 || $i == 7 || $i == 11 || $i == 15)
             $base->content .= "</tr>";

        }

        $base->content .= "</table>";

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
else {
    $base->content="NO!!";
}

$db->DBO();

$base->LayoutMain();
?>
