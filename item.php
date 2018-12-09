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

			$base->content .="
			<table class='item-table'>
	      <tr>
	         <td><img src='".$data[7]."' alt='".$data[0]."' title='".$data[0]."' id='itemimg' width='365px' height='450px' style='margin-right: 100px;'/></td>
	         <td class='item-text'>상품명 : ".$data[0]."<br/>색상 : 검정, 흰색, 파랑<br/>사이즈 : ".$data[3]."<br/>디자이너 : ".$data[5]."<br/>가격 : ".$data[1]." 원<br/> </td>
	      </tr>
	    </table>

	    <hr>
	     <img src='".$data[6]."' alt='".$data[0]."' title='".$data[0]."' id='itemimg' width='1000px'/>";

}

$db->DBO();

$base->LayoutMain();
?>
