<?php
require_once './layout.inc';
require_once './db.php';
$base = new Layout;
$base->link = './style.css';

//상품 등록 페이지
$base->content .= "<form action='imgsavedemo.php' method='post' enctype='multipart/form-data'>

<fieldset style='width:420px; margin-left:auto; margin-right:auto;'>
<table style='width: 400px;background-color: #ffffff; margin-left: auto; margin-right: auto; margin-top: 50px; border-radius: 5px; padding: 20px; height: 500px;'>
			<tr>
				<td><label for='Item' style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>상품명</label></td>
				<td><input type='text' id='Item' name='Item' maxlength='40' size='20' class='designer-text-field'/></td>
			</tr>

			<tr>
				<td><label for='Category' style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>카테고리</label></td>
				<td><input list='cate' id='Category' name='Category' maxlength='40' size='20' autocomplete='off' class='designer-text-field'/></td>
				<datalist id='cate'>
				  <option value='Outer'>
				  <option value='Top'>
				  <option value='Pants'>
				</datalist>

			</tr>

			<tr>
				<td><label for='price' style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>가격(원)</label></td>
				<td><input type='text' id='price' name='price' maxlength='40' size='20' class='designer-text-field'/></td>
			</tr>

			<tr>
				<td><label for='color' style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>색상</label></td>
				<td><input type='color' multiple = 'multiple' id='color' name='color' maxlength='40' size='20' /></td>
			</tr>

			<tr>
				<td><label for='size' style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>사이즈</label></td>
				<td><input type='text' id='size' name='size' maxlength='40' size='20' class='designer-text-field'/></td>
			</tr>

			<tr>

				<td><label for='material' style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>재질</label></td>
				<td><input type='text' id='material' name='material' maxlength='40' size='20' class='designer-text-field'/></td>
			</tr>

			<tr>

				<td><label for='img' style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>이미지</label></td>
				<td><input type='file' multiple='multiple' name='img' id='img'/></td>
			</tr>

			<tr>
				<td colspan='2'><input type='submit' value='submit' id='submit-btn'/></td>
			</tr>
</fieldset>
</form>";
$base->LayoutMain();
?>