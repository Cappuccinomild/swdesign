<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$db = new DBC;

$db->DBI();

$cate_id=$_GET['cate_id'];
$db->query = "SELECT GoodsID, ItemName, price, DesignerID, thumb FROM item WHERE CategoryID = '".$cate_id."'";

$db->DBQ();

if($db->result){//값이 존재할 경우
    $base->content="<h2>$cate_id</h2>
    	<table> <tr>";
		//메인페이지에 출력한다
		while($data = $db->result->fetch_row()){//링크를 클릭하면 newbook.html로 이동
			$base->content .=
      "<td> <a href = './item.php?item_id=".$data[0]."'><img src='".$data[4]."' alt='".$data[1]."' title='".$data[1]."' id='itemimg' width='270px' height='80px' /></a><br/>
      <a href = './item.php?item_id=".$data[0]."'>상품명 : ".$data[1]."<br/></a>디자이너 : ".$data[3]."<br/>가격 : ".$data[2]." </td>";
		}
		"</tr> </table>";
}
else {
    $base->content="NO!!";
}

$db->DBO();

$base->LayoutMain();
?>
