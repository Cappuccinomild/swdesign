<?php

require_once './layout.inc';

require_once './db.php';



$db = new DBC;

$db->DBI();



$base = new Layout;

$base->link = './style.css';

$GoodsID=$_GET['GoodsID'];

$CustomerID=$_GET['CustomerID'];


$db->query="UPDATE feedback SET permit = permit+1 WHERE GoodsID='".$GoodsID."' AND CustomerID='".$CustomerID."'";
	$db->DBQ();

  if(!$db->result)

  {

  	header("Content-Type: text/html; charset=UTF-8");

  	echo "<script>alert('승인에 실패하였습니다.');history.back();</script>";

  	exit;



  } else

  {
	echo "<script>alert('승인 되었습니다.');location.replace('/');</script>";

	$db->DBO();

	exit;
}
$base->content = "";



$base->LayoutMain();



?>
