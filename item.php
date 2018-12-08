<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$db = new DBC;

$db->DBI();

$item_id=$_GET['item_id'];

$db->query = "select ItemName, price, color, size, material, DesignerID, IMG, thumb from item WHERE GoodsID = '".$item_id."'";

$db->DBQ();



if($db->result){//값이 존재할 경우
		//메인페이지에 출력한다
		$data = $db->result->fetch_row();
			$base->content .=
      "<img src='".$data[7]."' alt='".$data[0]."' title='".$data[0]."' id='itemimg' width='200px' height='200px' />
	  상품명 : ".$data[0]."<br/>색상 : 이부분 더 코딩해야됨<br/>사이즈 : S,M,L<br/>디자이너 : ".$data[5]."<br/>가격 : ".$data[1]." 원<br/>
	    <img src='".$data[IMG]."' alt='".$data[0]."' title='".$data[0]."' id='itemimg' width='1000px' height='2500px' />";

}

$db->DBO();

$base->LayoutMain();
?>
