<?php

      // error_reporting(E_ALL);
      // ini_set('display_errors', '1');

include_once "./layout.inc"; // 레이아웃 include
require_once "./db.php";

$base = new Layout; // Layout class 객체를 생성
$base->link='./style.css'; // style.css를 레이아웃에 넣는다

$db = new DBC;

$db->DBI();

$id = $_SESSION['id'];

$db->query = "SELECT * FROM item";

$db->DBQ();

if($db->result){
  while($data = $db->result->fetch_row())
  $base->content.="<a href='#'>".$data[2]."</a>
  price : ".$data[3]."</br> color : ".$data[4]." </br> size : ".$data[5]."</br> material : ".$data[6]." </br> by ".$data[7].""; //본문을 만듦
}
$db->DBO();

$base->LayoutMain(); //위의 변수들이 입력된 객체를 출력

?>
