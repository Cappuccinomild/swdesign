<?php

  require_once './layout.inc';
  require_once './db.php';

  $base = new Layout;
  $base->link = './style.css';

  $id = $_SERVER['REMOTE_ADDR'];
  $time = date('H:i:s');
  $body = $_POST['body'];
  
  $db = new DBC;

  $db->DBI();

  $db->query = "INSERT INTO chat VALUES ('$id','$time', '$body', '' )";

  $db->DBQ();

   //등록 여부 출력
  if(!$db->result){//실패
    echo "<script>history.back();</script>";

    $db->DBO();

    exit;
  }
  else {//등록 완료
    echo "<script>history.back();</script>";
    $db->DBO();

    exit;
  }
  $db->close();

?>
