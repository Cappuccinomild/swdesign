<?php

  require_once './layout.inc';
  require_once './db.php';

  $base = new Layout;
  $base->link = './style.css';

  $id = $_SESSION['id'];

  $db = new DBC;

  $base->content="<p class='animated infinite pulse delay-2s'>류진호</p>";
  $db->DBI();

  //get max size
  $db->query = "SELECT COUNT(GoodsID) FROM item";

  $db->DBQ();

  if($db->result){//값이 존재할 경우
     $data = $db->result->fetch_row();
     $MAX=$data[0];
  }
  else {
    echo "no";
  }

  $db->DBO();

  $page = ($_GET['page'] * 16) - 16 ;
  $MAX = ceil($MAX/16) * 16;

  //get data
  $db = new DBC;

  $db->DBI();

  $db->query = "SELECT GoodsID, price, DesignerID, ItemName, thumb FROM item ORDER BY GoodsID desc LIMIT $page, 16 " ;
  $db->DBQ();


  if($db->result){//값이 존재할 경우
        //메인페이지에 출력한다
  		$base->content .="<table style='margin-left: auto; margin-right: auto;'>";
        for($i = 0; $data = $db->result->fetch_row(); $i = $i + 1){//링크를 클릭하면 newbook.html로 이동
        	if($i == 0 || $i == 4 || $i == 8 || $i == 12)
        		$base->content .="<tr>";

           $base->content .="<td style='text-align: center;'> <a href = './item.php?item_id=".$data[0]."'><img src='".$data[4]."' alt='".$data[3]."' title='".$data[3]."' id='itemimg' width='260px' height='380px' /></a><br/>
           <a href = './item.php?item_id=".$data[0]."'>".$data[3]."<br/></a>".$data[2]."<br/>".$data[1]."원</td>";

           if($i == 3 || $i == 7 || $i == 11 || $i == 15)
             $base->content .= "</tr>";

        }

        $base->content .= "</table>";

        if($_GET['page'] > 1){
          $board_num = $_GET['page'] - 1;
          $base->content .="<a href = './index.php?page=".$board_num."'> 이전 ";

        }
        for($board_num = 1 ; $board_num <= $MAX/16 ; $board_num = $board_num+1){
            $base->content .="<a href = './index.php?page=".$board_num."'> ".$board_num. " ";
        }
        if($_GET['page'] < $MAX/16){
          $board_num = $_GET['page'] + 1;
          $base->content .="<a href = './index.php?page=".$board_num."'> 다음 ";
        }
  }
  $base->LayoutMain();
  $db->DBO();
?>
