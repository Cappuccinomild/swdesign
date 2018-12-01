<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$db = new DBC;

$db->DBI();

$cate_id=$_GET['cate_id'];

$db->query = "select item_name, price, item_image from list WHERE cate_id = '".$cate_id."'";

$db->DBQ();



if($db->result){//값이 존재할 경우
    $base->content="<h2>$cate_id</h2>";
		//메인페이지에 출력한다
		while($data = $db->result->fetch_row()){//링크를 클릭하면 newbook.html로 이동
			$base->content .=
      "<a href = './item.html'><img src='".$data[2]."' alt='".$data[0]."' title='".$data[0]."' id='itemimg' width='270px' height='80px' /></a>
      <a href = './item.html'>상품명 : ".$data[0]."<br/></a>가격 : ".$data[1]."<br/>
			<br/>-------------------------<br/>";
		}
}

$db->DBO();

$base->LayoutMain();
?>
