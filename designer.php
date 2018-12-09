<?php
require_once './layout.inc';
require_once './db.php';
$base = new Layout;
$base->link = './style.css';


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
            <td><input type='text' id='color' name='color' maxlength='40' size='20' class='designer-text-field' placeholder='예) 검정, 빨강, 네이비'/></td>
         </tr>
         <tr>
            <td><label for='size' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>사이즈</label></td>
            <td style='float: left;'>
              <input type='checkbox' name='size[]' value='XS'>XS
              <input type='checkbox' name='size[]' value='S'>S
              <input type='checkbox' name='size[]' value='M'>M
              <input type='checkbox' name='size[]' value='L'>L
              <input type='checkbox' name='size[]' value='XL'>XL
              <input type='checkbox' name='size[]' value='XXL'>XXL
            </td>
         </tr>
         <tr>
            <td><label for='material' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>재질</label></td>
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



$base->LayoutMain();

?>
