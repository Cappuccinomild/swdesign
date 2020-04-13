<?php
//디자이너와 고객의 피드백 출력
require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$id = $_SERVER['REMOTE_ADDR'];

$db = new DBC;

$db->DBI();

$db->query = "SELECT id, time, body FROM chat ORDER BY num LIMIT ";

$db->DBQ();

if($db->result){//값이 존재할 경우
  //co_num이 0이면 고객 -> 디자이너, 1이면 디자이너 -> 고객
  for( ; $data = $db->result->fetch_row(); ){

        if(!strcmp($id, $DesignerID)){ //자기가 쓴 채팅
          $base->content .=" ".$data[0]." ".$data[2]." ".$data[1]." <br/>";//우측정렬

        }
        else{
          $base->content .=" ".$data[0]." ".$data[2]." ".$data[1]." <br/>";//좌측정렬

        }
    }
  }
else{
      $base->content .=" invalid value <br/>";
}

  $base->content .="<form action='./send.php' method='post'>
  <fieldset style='width: 400px; margin-left: auto; margin-right: auto; border: none;'>
  <p> feedback </p>
  <table style='margin-bottom: -15px;'>
    <tr>
      <td style='text-align:left;'><label for='body' id='msg-table-text'>내용</label></td>
    </tr>
  </table>
    <p style='text-align:left;'><textarea name='body' rows='10' cols='80' type='text'></textarea></p>
    <p><input type='submit' value='전송' id='submit-btn'/></p>
  </fieldset>
  </form>

  ";
}

$db->DBO();


$base->LayoutMain();
?>
