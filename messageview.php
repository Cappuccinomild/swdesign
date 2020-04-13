
<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$db = new DBC;

$db->DBI();

$id = $_SESSION['id'];

$db->query = "SELECT regist_type FROM member WHERE id = '".$id."' ";

$db->DBQ();

if($id == ""){

    echo "<script>alert('로그인이 필요한 서비스입니다.');location.replace('./login.php');</script>";

    $db->DBO();

    exit;

}else{

  if($db->result){

    $data = $db->result->fetch_row();
    $db->DBO();

    if($data[0] == 'customer'){

      $db->DBI();
      $db->query = "SELECT rownum, DesignerID, title FROM message WHERE CustomerID = '".$id."' ";
      $db->DBQ();

      if($db->result)
        while($data = $db->result->fetch_row())
          $base->content .= " 발신인 : ".$data[1]." 제목 : <a href = './messagedetail.php?num=".$data[0]."&by=c'>".$data[2]."<br/>";

    }

    else if($data[0] == 'designer'){

      $db->DBI();
      $db->query = "SELECT rownum, CustomerID, title FROM message WHERE DesignerID = '".$id."' ";
      $db->DBQ();

      if($db->result){
        while($data = $db->result->fetch_row())
          $base->content .= " 발신인 : ".$data[1]." 제목 : <a href = './messagedetail.php?num=".$data[0]."&by=c'>".$data[2]."<br/>";
        }
  }
}
}


$base->LayoutMain();

$db->DBO();
?>
