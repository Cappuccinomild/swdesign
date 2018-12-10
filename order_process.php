<?php

require_once './layout.inc';

require_once './db.php';



$db = new DBC;

$db->DBI();



$base = new Layout;

$base->link = './style.css';

$item_id=$_GET['item_id'];

$designer=$_GET['designer'];

$color = $_POST['color'];

$id = $_SESSION['id'];

$size = $_POST['size'];

$name = $_POST['name'];

$phone = $_POST['phone'];

$address = $_POST['address'];

$mail = $_POST['mail'];

$memo = $_POST['memo'];

$body="색상: $color\n사이즈: $size\n요구사항: $memo";

$db->query = "INSERT INTO feedback VALUES('".$id."', '".$designer."','".$item_id."' , 0, '".$body."', 0 ,0)";

$db->DBQ();



if(!$db->result)

{

	header("Content-Type: text/html; charset=UTF-8");

	echo "<script>alert('주문에 실패하였습니다.');history.back();</script>";

	$db->DBO();

	exit;



} else

{

	echo "<script>alert('주문이 완료 되었습니다.');location.replace('/');</script>";

	$db->DBO();

	exit;

}





$base->content = "";



$base->LayoutMain();



?>
