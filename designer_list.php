<?php

  require_once './layout.inc';
  require_once './db.php';

  $base = new Layout;
  $base->link = './style.css';

  $id = $_SESSION['id'];

  $db = new DBC;

  $db->DBI();

  //get max size
  $db->query = "SELECT COUNT(GoodsID) FROM item WHERE DesignerID = '".$id."' ";

  $db->DBQ();

  if($db->result){//값이 존재할 경우
     $data = $db->result->fetch_row();
     $MAX=$data[0];
  }
  else {
    echo "no";
  }

  $db->DBO();


  $last = ($_GET['now'] * 10) - 1 ;
  $now = ($_GET['now'] * 10) - 10 ;
  $MAX = ceil($MAX/10) * 10;

  //get data
  $db = new DBC;

  $db->DBI();

  $db->query = "SELECT GoodsID, CategoryID, ItemName, thumb FROM item WHERE DesignerID = '".$id."' ORDER BY GoodsID desc LIMIT $now, 10 " ;
                                                                                                    //by idx desc limit 0,5
  $db->DBQ();

  if($db->result){//값이 존재할 경우
        //메인페이지에 출력한다
        for($i = 0; $data = $db->result->fetch_row(); $i = $i + 1){//링크를 클릭하면 newbook.html로 이동

           $base->content .="<td style='margin-left: 20px; margin-right: 20px;'> <a href = './item.php?item_id=".$data[0]."'><img src='".$data[3]."' alt='".$data[2]."' title='".$data[2]."' id='itemimg' width='270px' height='80px' /></a>
           <a href = './item.php?item_id=".$data[0]."'>상품명 : ".$data[2]."</td></a>";

           if($i == 4)
             $base->content .= "<br/>";
        }

        $base->content .= "<br/>";

        if($_GET['now'] > 1){
          $board_num = $_GET['now'] - 1;
          $base->content .="<a href = './designer_list.php?now=".$board_num."'> 이전 ";

        }
        for($board_num = 1 ; $board_num <= $MAX/10 ; $board_num = $board_num+1){
            $base->content .="<a href = './designer_list.php?now=".$board_num."'> ".$board_num. " ";
        }
        if($_GET['now'] < $MAX/10){
          $board_num = $_GET['now'] + 1;
          $base->content .="<a href = './designer_list.php?now=".$board_num."'> 다음 ";
        }
  }
  $base->LayoutMain();
  $db->DBO();
?>
