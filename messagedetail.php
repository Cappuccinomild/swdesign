<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

if(!isset($_GET['num'])){

    echo "<script>alert('잘못된 경로');location.replace('./login.php');</script>";

}
$num = $_GET['num'];

$db = new DBC;

$db->DBI();

if($_GET['by'] == 'd'){
  $db->query = "SELECT DesignerID, title, body FROM message WHERE rownum = '".$num."' ";

  $db->DBQ();

  if($db->result){

      $data = $db->result->fetch_row();
      $base->content .= " 발신인 : ".$data[0]." 제목 : ".$data[1]." ".$data[2]." <br/>";

      $base->content .= "<form action='message.php' method='post'>

      

        <input type='hidden' id='DesignerID' name='DesignerID' value ='".$data[0]."' /></p>



      <p><input type='submit' value='답장' /></p>
    </form>";
  }
}
else if($_GET['by'] == 'c'){

  $db->query = "SELECT CustomerID, title, body FROM message WHERE rownum = '".$num."' ";

  $db->DBQ();

  if($db->result){
      $data = $db->result->fetch_row();
      $base->content .= " 발신인 : ".$data[0]." <br/>제목 : ".$data[1]."<br/>".$data[2]." <br/>";
      $base->content .= "<form action='message.php' method='post'>



        <input type='hidden' id='CustomerID' name='CustomerID' value = '".$data[0]."' />



      <p><input type='submit' value='답장' /></p>
    </form>";
  }
}

$base->LayoutMain();

$db->DBO();
?>
