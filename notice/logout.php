<?php

require_once './layout.inc';



$base = new Layout;

$base->link = './style.css';



$base->LayoutMain();



unset($_SESSION['id']);

unset($_SESSION['permit']);

unset($_SESSION['regist_type']);

session_destroy();



echo "<script>alert('로그아웃 되었습니다.');location.replace('/')</script>";

?>
