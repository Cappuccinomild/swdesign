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

$allowed_ext = array('jpg','jpeg','png','gif');

$error = $_FILES['img']['error'];
$name = $_FILES['img']['name'];
$ext = array_pop(explode('.', $name));

if( $error != UPLOAD_ERR_OK ) {
 switch( $error ) {
	 case UPLOAD_ERR_INI_SIZE:
	 case UPLOAD_ERR_FORM_SIZE:
		 echo "<script>alert('파일이 너무 큽니다.');history.back();</script>";
		 break;
	 case UPLOAD_ERR_NO_FILE:
		 echo "<script>alert('파일이 첨부되지 않았습니다.');history.back();</script>";
		 break;
	 default:
		 echo "<script>alert('파일이 제대로 업로드되지 않았습니다.');history.back();</script>";

 }
 exit;
}
if( !in_array($ext, $allowed_ext) ) {
 echo "<script>alert('허용되지 않는 이미지 확장자입니다.');history.back();</script>";
 exit;
}

 $imglink = "./images/".$item_id."_".$id.".".$ext;

move_uploaded_file( $_FILES['img']['tmp_name'], $imglink);


$db->query = "INSERT INTO feedback VALUES('".$id."', '".$designer."','".$item_id."' , 0, '".$body."', '".$imglink."' ,0)";

$db->DBQ();


if(!$db->result)

{

	header("Content-Type: text/html; charset=UTF-8");

	echo "<script>alert('주문에 실패하였습니다.');history.back();</script>";

	$db->DBO();

	exit;



} else

{
	$db->query="UPDATE item SET total_order = total_order+1 WHERE GoodsID=".$item_id;
	$db->DBQ();

	echo "<script>alert('주문이 완료 되었습니다.');location.replace('/');</script>";

	$db->DBO();

	exit;

}





$base->content = "";



$base->LayoutMain();



?>
