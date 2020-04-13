
<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$GoodsID = $_GET['goodsid'];

$db = new DBC;

$db->DBI();

$id = $_SESSION['id'];

$db->query = "SELECT CustomerID, body FROM feedback WHERE DesignerID = '".$id."' ";

$db->DBQ();

if($db->result){
  while($data = $db->result->fetch_row()){
    $base->content = "주문자 : $data[0] 내용 : <a href = './feedback.php?goodsid=".$GoodsID."&customerid=".$data[0]."'> $data[1]<br/>";
  }
}



$base->LayoutMain();
$db->DBO();
?>
