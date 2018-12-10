<?php

  require_once './layout.inc';
  require_once './db.php';

  $base = new Layout;
  $base->link = './style.css';

  $co_num = $_GET['co_num'];//co_num이 0이면 고객 -> 디자이너, 1이면 디자이너 -> 고객
  $GoodsID = $_GET['goodsid'];

  if($co_num){ //디자이너가 고객에게
    $DesignerID = $_SESSION['id'];
    $CustomerID = $_POST['CustomerID'];
  }

  else{ //고객이 디자이너에게
    $DesignerID = $_POST['DesignerID'];
    $CustomerID = $_SESSION['id'];
  }

  if(!isset($_POST['body'])){
    echo "<script>alert('내용을 입력해주세요');history.back();</script>";
  }

  //ID CHECK
  $db = new DBC;

  $db->DBI();

  $db->query = "SELECT id FROM member WHERE regist_type = 'designer' AND id = '$DesignerID' ";

  $db->DBQ();

  //존재하지 않는 아이디
  if(!$db->result){
    echo "<script>alert('존재하지 않는 아이디입니다.');history.back();</script>";

    $db->DBO();

    exit;
  }

    //REGIST
   $db = new DBC;

   $db->DBI();

   //GOODSID가 0인건 없으니까 goodsid가 0인건 쪽지로 합시다
    $db->query = "INSERT INTO feedback VALUES('".$CustomerID."', '".$DesignerID."', 0, '".$Title."', '".$Body."', 0 ,0)";

   $db->DBQ();

   //등록 여부 출력
  if(!$db->result){//실패
    echo "<script>alert('전송 실패');history.back();</script>";

    $db->DBO();

    exit;
  }
  else {//등록 완료
    echo "<script>alert('전송 완료.');location.replace('./message.php');</script>";

    $db->DBO();

    exit;
  }
  $db->close();
}

?>
