<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';



$db = new DBC;

$db->DBI();



$id = $_POST['logid'];

$pass = $_POST['logpass'];



$db->query = "select id, pass, permit,regist_type from member where id='".$id."' and pass=password('".$pass."')";

$db->DBQ();



$num = $db->result->num_rows;

$data = $db->result->fetch_row();



$db->DBO();



if($num==1)

{

	$_SESSION['id'] = $id;

	$_SESSION['permit'] = $data[2];

	$_SESSION['regist_type']=$data[3];

	echo "<script>location.replace('/');</script>";

} else if(($id!="" || $pass!="") && $data[0]!=1)

{

	echo "<script>alert('아이디와 비밀번호가 맞지 않습니다.');</script>";

}



$base->content = "

<form action='".$_SERVER['PHP_SELF']."' method='post'>

	<table style='width: 700px;background-color: #ffffff; margin-left: auto; margin-right: auto; margin-top: 50px; border-radius: 5px; padding: 20px; height: 500px;'>

		<tr>

			<th colspan='2'>로그인</th>

		</tr>

		<tr>

			<td><input type='text' name='logid'size='16' class='text-field' placeholder='아이디'/></td>



		</tr>

		<tr>

			<td><input type='password' name='logpass' size='16' class='text-field' placeholder='비밀번호'/></td>
			<td><input type='submit' value='로그인' style='height:50px;'/></td>
		</tr>

		<tr>

			<td><a href='./registi.php'>등록</a></td>

			<td style='text-align:right;'><a href='./find.php'>찾기</a></td>

		</tr>

	</table>

</form>

";



$base->LayoutMain();



?>
