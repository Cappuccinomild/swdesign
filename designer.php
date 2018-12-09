<?php
require_once './layout.inc';
require_once './db.php';
$base = new Layout;
$base->link = './style.css';

$db = new DBC;

$db->DBI();

$id = $_SESSION['id'];

$db->query = "SELECT GoodsID, CategoryID, ItemName, thumb FROM item WHERE DesignerID = '".$id."'";

$db->DBQ();

if($db->result){//값이 존재할 경우
      //메인페이지에 출력한다
      while($data = $db->result->fetch_row()){//링크를 클릭하면 newbook.html로 이동
         $base->content .="<td style='margin-left: 20px; margin-right: 20px;'> <a href = './item.php?item_id=".$data[0]."'><img src='".$data[3]."' alt='".$data[2]."' title='".$data[2]."' id='itemimg' width='270px' height='80px' /></a><br/>
         <a href = './item.php?item_id=".$data[0]."'>상품명 : ".$data[2]."</td></a>";
      }
}

//상품 등록 페이지

$base->content .= "<form action='imgsavedemo.php' method='post' enctype='multipart/form-data'>
   <p> 상품 등록 </p>
<table style='width: 60%;background-color: #ffffff; margin-left: auto; margin-right: auto; border-radius: 5px; height: 500px; border-top: solid; border-bottom:solid;'>
         <tr>
            <td><label for='Item' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>상품명</label></td>
            <td><input type='text' id='Item' name='Item' maxlength='40' size='20' class='designer-text-field'/></td>
         </tr>
         <tr>
            <td><label for='Category' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>카테고리</label></td>
            <td style='float: left;'>
            <select id='Category' name='Category'>
              <option value='outer'>Outer</option>
              <option value='top'>Top</option>
              <option value='pants'>Pants</option>
              <option value='skirt'>Skirt</option>
              <option value='accessory'>Accessory</option>
              <option value='etc'>etc</option>
            </select></td>
         </tr>
         <tr>
            <td><label for='price' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>가격(원)</label></td>
            <td><input type='text' id='price' name='price' maxlength='40' size='20' class='designer-text-field'/></td>
         </tr>
         <tr>
            <td><label for='color' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>색상</label></td>
            <td style='float: left;'><input type='color' multiple = 'multiple' id='color' name='color' maxlength='40' size='20' /></td>
         </tr>
         <tr>
            <td><label for='size' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>사이즈</label></td>
            <td><input type='text' id='size' name='size' maxlength='40' size='20' class='designer-text-field'/></td>
         </tr>
         <tr>
            <td><label for='material' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>재료</label></td>
            <td><input type='text' id='material' name='material' maxlength='40' size='20' class='designer-text-field'/></td>
         </tr>
				 <tr>
            <td><label for='img' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>썸네일</label></td>
            <td style='float: left;'><input type='file' multiple='multiple' name='thumb' id='thumb'/></td>
         </tr>
         <tr>
            <td><label for='img' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>이미지</label></td>
            <td style='float: left;'><input type='file' multiple='multiple' name='img' id='img'/></td>
         </tr>

         <tr>
            <td colspan='2'><input type='submit' value='등록' id='submit-btn'/></td>
         </tr>
</form>";

$db->DBO();

$base->LayoutMain();

?>
