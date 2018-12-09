<?php

  require_once './layout.inc';
  require_once './db.php';

  $base = new Layout;
  $base->link = './style.css';


if(isset($_POST['DesignerID'])){//고객이 디자이너에게
  if( !isset($_POST['DesignerID']) ||!isset($_POST['Title']) || !isset($_POST['body'])){
      echo "<p>you have not entered all the required details.<br />
      Please go back and try again.</p>";
      exit;
   }

  $CustomerID = $_SESSION['id'];
  $DesignerID = $_POST['DesignerID'];
  $Title=$_POST['Title'];
  $Body=$_POST['body'];

  //ID CHECK
  $db = new DBC;

  $db->DBI();

  $db->query = "SELECT id FROM member WHERE regist_type = 'designer' AND id = $DesignerID ";

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
   $db->query = "INSERT INTO feedback VALUES('".$CustomerID."', '".$DesignerID."', 0, '".$Title."', '".$Body."', 0 )";

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

//***********************************************************************//

else if( isset($_POST['CustomerID'])){//디자이너가 고객에게
  if( !isset($_POST['CustomerID']) ||!isset($_POST['Title']) || !isset($_POST['body'])){
      echo "<p>you have not entered all the required details.<br />
      Please go back and try again.</p>";
      exit;
   }

  $CustomerID = $_POST['CustomerID'];
  $DesignerID = $_SESSION['id'];
  $Title=$_POST['Title'];
  $Body=$_POST['body'];

  //ID CHECK
  $db = new DBC;

  $db->DBI();

  $db->query = "SELECT id FROM member WHERE regist_type = 'customer' AND id = $CustomerID ";

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
   $db->query = "INSERT INTO feedback VALUES( '".$CustomerID."', '".$DesignerID."', 0, '".$Title."', '".$Body."', 0 )";

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
