<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$base->content = "

<form action='".$_SERVER['PHP_SELF']."' method='post'>

	<table style='width: 450px;background-color: #ffffff; margin-left: auto; margin-right: auto; margin-top: 50px; border-radius: 5px; padding: 20px; height: 200px;'>

		<tr>

			<th colspan='2' style='font-family: 휴먼모음T; font-size: 30px; color: #000000;'>로그인</th>

		</tr>

		<tr>

			<td><input type='text' name='logid' size='20' class='text-field' placeholder='아이디'/></td>

		</tr>

		<tr>

			<td><input type='password' name='logpass' size='20' class='text-field' placeholder='비밀번호'/></td>

		</tr>

		<tr>
			<td colspan='2'><input type='submit' id='login-btn' value='로그인'/></td>
		</tr>
		<tr>

			<td><a href='./registi.php' class='sub-text'>등록</a> <a href='./find.php' class='sub-text'>ID/PASSWORD 찾기</a>
			</td>

		</tr>

	</table>

</form>

";



$base->LayoutMain();



?>
