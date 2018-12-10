<?php
//디자이너와 고객의 피드백 출력
require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$id = $_SESSION['id'];

$GoodsID=$_GET['goodsid'];

if(isset($_GET['designerid'])){//고객이 마이페이지에서 들어갈 경우

  $DesignerID = $_GET['designerid'];
  $CustomerID = $id;

} else if(isset($_GET['customerid'])){//디자이너가 마이페이지에서 들어갈경우

  $DesignerID = $id;
  $CustomerID = $_GET['customerid'];

}

$db = new DBC;

$db->DBI();

$db->query = "SELECT title, body, link FROM feedback
							WHERE CustomerID = '$CustomerID' AND DesignerID = '$DesignerID' AND GoodsID = '$GoodsID' ";

$db->DBQ();

if($db->result){//처음온 피드백 출력
	 $data = $db->result->fetch_row();
	 $base->content .= "   <fieldset style='width: 400px; margin-left: auto; margin-right: auto; border: none;'><br/><br/><img src='".$data[2]."' id='itemimg' width='365px' height='450px' style='margin-right: 50px; float:left;'/> <br/>".$data[1]." <br/></fieldset> <hr/>";
}
else{
	echo "no";
}

$db->DBO();

$db = new DBC;

$db->DBI();

$db->query = "SELECT co_num, memo FROM comment
							WHERE CustomerID = '$CustomerID' AND DesignerID = '$DesignerID' AND GoodsID = '$GoodsID'";

$db->DBQ();

if($db->result){//값이 존재할 경우
  //co_num이 0이면 고객 -> 디자이너, 1이면 디자이너 -> 고객
  for($i= 0 ; $data = $db->result->fetch_row(); $i = $i + 1){

      if($data[0] == 0){//고객 -> 디자이너
          if(!strcmp($id, $DesignerID)){ //디자이너가 보고있는거니까
            $base->content .=" ".$data[1]." <br/>";//좌측정렬

          }
          else{
            $base->content .=" ".$data[1]." <br/>";//우측정렬

          }
      }
      else if($data[0] == 1){
        if(!strcmp($id, $DesignerID)){ //디자이너가 보고있는거니까
          $base->content .=" ".$data[1]." <br/>";//우측정렬

        }
        else{
          $base->content .=" ".$data[1]." <br/>";//좌측정렬

        }
      }
      else{
          $base->content .=" invalid value <br/>";

      }

  }

}

if($id == $DesignerID){
  //디자이너가 접속
  $base->content .="<form action='./addcomm.php?goodsid=".$GoodsID."&co_num=1' method='post'>
  <fieldset style='width: 400px; margin-left: auto; margin-right: auto; border: none;'>
  <p> feedback </p>
  <table style='margin-bottom: -15px;'>
    <tr>
      <td style='text-align:left;'><label for='body' id='msg-table-text'>내용</label></td>
    </tr>
  </table>

    <input type='hidden' id='CustomerID' name='CustomerID' value='".$CustomerID."' />

    <p style='text-align:left;'><textarea name='body' rows='10' cols='80' type='text'></textarea></p>
    <p><input type='submit' value='전송' id='submit-btn'/></p>
  </fieldset>
  <a href='./permit_change.php?CustomerID=".$CustomerID."&GoodsID=".$GoodsID."' class='buy_but' style='text-align: center; height: 35px; width:180px; font-size:28px; padding : 10px; margin-top:20px; margin-bottom:20px;display:inline-block;'>승인</a>
  </form>

  ";
}
else if($id == $CustomerID){
  //고객이 접속
  $base->content .="<form action='./addcomm.php?goodsid=".$GoodsID."&co_num=0' method='post'>
  <fieldset style='width: 400px; margin-left: auto; margin-right: auto; border: none;'>
  <p> feedback </p>
  <table style='margin-bottom: -15px;'>
    <tr>
      <td style='text-align:left;'><label for='body' id='msg-table-text'>내용</label></td>
    </tr>
  </table>

    <input type='hidden' id='DesignerID' name='DesignerID' value='".$DesignerID."' />

    <p style='text-align:left;'><textarea name='body' rows='10' cols='80' type='text'></textarea></p>
    <p><input type='submit' value='전송' id='submit-btn'/></p>
  </fieldset>
  </form>

  ";
}

$db->DBO();


$base->LayoutMain();
?>
