
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

    if($data[0] == 'customer'){

      $db->DBI();
      $db->query = "SELECT DesignerID, title FROM feedback WHERE CustomerID = '".$id."' AND GoodsID = 0 ";
      $db->DBQ();

      while($data = $db->result->fetch_row())
        $base->content .= " 발신인 : ".$data[0]." 제목 : ".$data[1]." ";

    }

    else if($data[0] == 'designer'){

      $base->content = "<form action='send.php' method='post'>
      <fieldset style='width: 400px; margin-left: auto; margin-right: auto; border: none;'>
      <p> 쪽지 </p>
      <table style='margin-bottom: -15px;'>
        <tr>
          <td style='text-align:left;'><label for='DesignerID' id='msg-table-text'> 소비자 ID</td>
          <td><input type='text' id='CustomerID' name='CustomerID'
          maxlength='13' size='30'/></td>
        </tr>
        <tr>
          <td style='text-align:left;'><label for='Title' id='msg-table-text'>제목</label></td>
          <td><input type='text' id='Title' name='Title'maxlength='40' size='30'/></td>
        </tr>
        <tr>
          <td style='text-align:left;'><label for='body' id='msg-table-text'>내용</label></td>
        </tr>
      </table>

      <p style='text-align:left;'><textarea name='body' rows='10' cols='80' type='text'></textarea></p>
        <p><input type='submit' value='전송' id='submit-btn'/></p>
      </fieldset>
      </form>";

    }

  }
}


$db->DBO();
$base->LayoutMain();
?>
