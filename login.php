<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$db = new DBC;
$db->DBI();

//id와 password값을 post 형태로 받음
$id = $_POST['logid'];
$pass = $_POST['logpass'];

//id와 password에 해당하는 정보 쿼리로 받음
$db->query = "select id, pass, permit,regist_type from member where id='".$id."' and pass=password('".$pass."')";
$db->DBQ();

$num = $db->result->num_rows;
$data = $db->result->fetch_row();
$db->DBO();

//해당하는 정보가 1개면 접속을 하고 세션값으로 나머지 정보를 받으며 메인페이지로 돌아감
if($num==1)
{
   $_SESSION['id'] = $id;
   $_SESSION['permit'] = $data[2];
   $_SESSION['regist_type']=$data[3];
   echo "<script>location.replace('/');</script>";
} else if(($id!="" || $pass!="") && $data[0]!=1) //아이디 비밀번호 정보가 맞지않을 경우
{
   echo "<script>alert('아이디와 비밀번호가 맞지 않습니다.');</script>";
}

$base->content = "

<form action='".$_SERVER['PHP_SELF']."' method='post'>
   <table style='width: 450px;background-color: #ffffff; margin-left: auto; margin-right: auto; margin-top: 50px; border-radius: 5px; padding: 20px; height: 200px;'>
      <tr>
         <td class='text-login'> 로그인 </td>
      </tr>

      <tr>
         <td><input type='text' name='logid' size='20' class='text-field' style='padding: 10px; width: 94%;' placeholder='아이디'/></td>
      </tr>

      <tr>
         <td><input type='password' name='logpass' size='20' class='text-field'  style='padding: 10px; width: 94%;' placeholder='비밀번호'/></td>
      </tr>

      <tr>
         <td colspan='2'><input type='submit' id='login-btn' value='로그인'/><hr style='margin-top: 5px;'/></td>
      </tr>
      <tr>

         <td><a href='./registi.php' class='sub-text'>회원가입</a> <a href='./find.php' class='sub-text'>ID/PASSWORD 찾기</a>
         </td>

      </tr>

   </table>
</form>

";



$base->LayoutMain();



?>
