<?php

  require_once './layout.inc';
  require_once './db.php';

  $base = new Layout;
  $base->link = './style.css';

  if(!isset($_POST['body'])){
    echo "<script>alert('내용을 입력해주세요');history.back();</script>";
  }

  $co_num = $_GET['co_num'];//co_num이 0이면 고객 -> 디자이너, 1이면 디자이너 -> 고객
  $GoodsID = $_GET['goodsid'];
  $memo = $_POST['body'];

  if($co_num){ //디자이너가 고객에게
    $DesignerID = $_SESSION['id'];
    $CustomerID = $_POST['CustomerID'];
  }

  else{ //고객이 디자이너에게
    $DesignerID = $_POST['DesignerID'];
    $CustomerID = $_SESSION['id'];
  }

  //put
  $db = new DBC;

  $db->DBI();

  $db->query = "INSERT INTO comment VALUES ('$GoodsID','$memo', '$DesignerID', '$CustomerID', '$co_num' )";

  $db->DBQ();

   //등록 여부 출력
  if(!$db->result){//실패
    echo "<script>alert('전송 실패');history.back();</script>";

    $db->DBO();

    exit;
  }
  else {//등록 완료
    echo "<script>alert('전송 완료.');history.back();</script>";
    $db->DBO();

    exit;
  }
  $db->close();

?>
