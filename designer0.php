<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$db = new DBC;

$db->DBI();

$id = $_SESSION['id'];

$db->query = "SELECT title, body, CustomerID, GoodsID FROM feedback WHERE DesignerID = $id";

$db->DBQ();

if($db->result){//값이 존재할 경우

		//메인페이지에 출력한다
		while($data = $db->result->fetch_row()){//링크를 클릭하면 newbook.html로 이동
			$base->content .="<a href = './newbook.html'>
			title : ".$data[0]."<br/>body : ".$data[1]."</a>
			<br/>-------------------------<br/>";
		}
}


$db->DBO();

$base->LayoutMain();
?>
