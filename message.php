
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

      $base->content = "<form action='send.php' method='post'>

      <fieldset>
        <p style='text-align:left;'><label for='DesignerID'>DesignerID</label>
        <input type='text' id='DesignerID' name='DesignerID'
        maxlength='13' size='13' /></p>

        <p style='text-align:left;'><label for='Title'>Title</label>
        <input type='text' id='Title' name='Title'
        maxlength='40' size='7' /></p>

        <p style='text-align:left;'><label for='body'>내용</label></p>
        <p style='text-align:left;'><textarea name='body' rows='10' cols='80' type='text'></textarea></p>
      </fieldset>

      <p><input type='submit' value='submit' /></p>
      </form>";

    }

    else if($data[0] == 'designer'){

      $base->content = "<form action='send.php' method='post'>

      <fieldset>

        <p><label for='DesignerID'>CustomerID</label>
        <input type='text' id='CustomerID' name='CustomerID'
        maxlength='13' size='13' /></p>

        <p><label for='Title'>Title</label>
        <input type='text' id='Title' name='Title'
        maxlength='40' size='7' /></p>

        <p><label for='body'>Body</label>
        <input type='text' id='body' name='body'
        maxlength='400' size='100' /></p>
      </fieldset>

      <p><input type='submit' value='submit' /></p>
      </form>";

    }

  }
}


$db->DBO();
$base->LayoutMain();
?>
