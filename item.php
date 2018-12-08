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
      "출력 : ".$data[0].$data[1].$data[2].$data[3].$data[4].$data[5].$data[6].$data[7]."<br/>";

}

$db->DBO();

$base->LayoutMain();
?>
