<?php



require_once './layout.inc';



$base = new Layout;



$base->link = './style.css';

$base->content = "

	<form action='./registo.php' method='post'>
		<table style='width: 700px;background-color: #ffffff; margin-left: auto; margin-right: auto; margin-top: 50px; border-radius: 5px; padding: 20px; height: 500px;'>
			<tr>

				<th colspan='2' style='font-family: 휴먼모음T; font-size: 30px; color: #000000;'>회원가입</th>

			</tr>

			<tr>

				<td style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'> 가입 유형 </td>

				<td style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>
					<input type='radio' name='regist_type' value='customer' /> 고객
		  			<input type='radio' name='regist_type' value='designer' /> 디자이너
				</td>

			</tr>

			<tr>

				<td style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>이름</td>

				<td><input type='text' size='20' name='name' class='text-field' placeholder='이름''/></td>

			</tr>

			<tr>

				<td style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>아이디</td>

				<td><input type='text' size='16' name='id' class='text-field'  placeholder='아이디'/></td>

			</tr>

			<tr>

				<td style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>비밀번호</td>

				<td><input type='password' size='16' name='pass1' class='text-field'  placeholder='비밀번호'/></td>

			</tr>

			<tr>

				<td style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>비밀번호 확인</td>

				<td><input type='password' size='16' name='pass2' class='text-field'  placeholder='비밀번호 확인'/></td>

			</tr>

			<tr>

				<td style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>이메일</td>

				<td><input type='text' size='16' name='mail' class='text-field'  placeholder='example@email.com'/></td>

			</tr>

			<tr>

				<td style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>휴대전화</td>

				<td><input type='text' size='20' name='phone' class='text-field' placeholder='휴대전화'/></td>

			</tr>

			<tr>

				<td style='font-family: 휴먼모음T; font-size: 20px; color: #545454;'>주소</td>

				<td><input type='text' size='30' name='address' class='text-field' placeholder='주소''/></td>

			</tr>

			<tr>

				<td colspan='2'><input type='submit' value='등록' id='submit-btn'/></td>

			</tr>
	</form>
	
";

$base->LayoutMain();

?>
