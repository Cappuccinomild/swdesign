<?php
//피드백 진행중인 상품
require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$id = $_SESSION['id'];
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
else {
	$page=1;
}

$db = new DBC;

$db->DBI();

//GoodsID가 0인거는 메세지용
$db->query = "SELECT COUNT(GoodsID) FROM feedback
							WHERE CustomerID = '".$id."' AND permit = 0 AND NOT GoodsID = 0 ";

$db->DBQ();

if($db->result){//값이 존재할 경우
	 $data = $db->result->fetch_row();
	 $MAX=$data[0];
}
else{
	echo "no";
}
$db->DBO();

$firstPageNum = ($page * 16) - 16 ;
$MAX = ceil($MAX/16) * 16;

$db = new DBC;
$db1 = new DBC;

$db->DBI();
$db1->DBI();

$db->query = "SELECT GoodsID FROM feedback WHERE CustomerID = $id AND permit = 0 ORDER BY GoodsID desc LIMIT $firstPageNum, 16 ";

$db->DBQ();

if($db->result){//값이 존재할 경우
	 $base->content .="<table style='margin-left: auto; margin-right: auto;'>";
	 //메인페이지에 출력한다
	 for($i = 0 ; $data = $db->result->fetch_row() ; $i = $i + 1){//링크를 클릭하면 newbook.html로 이동
		 $db1->query = "SELECT ItemName, thumb, DesignerID FROM item WHERE GoodsID = $data[0] ";

		 $db1->DBQ();

		 $data1 = $db1->result->fetch_row();

		 if($i == 0 || $i == 4 || $i == 8 || $i == 12)
			 $base->content .="<tr>";

			 $base->content .="<td style='text-align: center; padding: 10px; height: 450px;'> <a href = './feedback.php?goodsid=".$data[0]."&designerid=".$data1[2]."'><img src='".$data1[1]."' alt='".$data1[0]."' title='".$data1[0]."' id='itemimg' width='261px' height='341px' /></a><br/>
			 <a href = './feedback.php?goodsid=".$data[0]."&designerid=".$data1[2]."'>".$data1[0]."<br/></a></td>";

			 if($i == 3 || $i == 7 || $i == 11 || $i == 15)
				 $base->content .= "</tr>";

	 }

	 $base->content .= "</table>";

	 if($page > 1){
		 $board_num = $page - 1;
		 $base->content .="<a href = './customer.php?page=".$board_num."'> 이전 ";

	 }
	 for($board_num = 1 ; $board_num <= $MAX/16 ; $board_num = $board_num+1){
			 $base->content .="<a href = './customer.php?page=".$board_num."'> ".$board_num. " ";
	 }
	 if($page < $MAX/16){
		 $board_num = $page + 1;
		 $base->content .="<a href = './customer.php?page=".$board_num."'> 다음 ";
	 }
}

$base->LayoutMain();

$db->DBO();


?>
