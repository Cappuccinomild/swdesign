<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$item_id=$_GET['item_id'];
if(!isset($_SESSION['id'])){
	echo "<script>alert('로그인이 필요합니다.');location.replace('./login.php');</script>";
}
else {
	$id=$_SESSION['id'];
}

$db = new DBC;

$db->DBI();

$db->query = "select ItemName, price, color, size, material, DesignerID, IMG, thumb from item WHERE GoodsID = '".$item_id."'";

$db->DBQ();

if($db->result){//값이 존재할 경우
		//메인페이지에 출력한다
		$data = $db->result->fetch_row();
				$base->content .="<h2>상품 주문</h2>
				<table class='item-table'>
					<td style='border-right:1px solid gray;'><img src='".$data[7]."' alt='".$data[0]."' title='".$data[0]."' id='itemimg' width='120px' height='150px' style='margin-right: 50px; float:left;'/></td>
		      <td class='item-text' width='800px'>주문 상품명 : ".$data[0]."<br/>디자이너 : ".$data[5]."<br/>색상 : 검정, 흰색, 파랑<br/>사이즈 : ".$data[3]."<br/>가격 : ".$data[1]." 원</td>

		        </table>
						<br/><hr class='style-eight'/>";



}
else {
	echo "NO!";
	exit(1);
}

$db->DBO();

//사용자정보 입력받음
$db = new DBC;

$db->DBI();

$db->query = "select address, mail, name, phone from member WHERE id = '".$id."'";

$db->DBQ();



//사용자 정보 입력 받음

if($db->result){//값이 존재할 경우
		//메인페이지에 출력한다
		$data = $db->result->fetch_row();

			$base->content.="<form action='./registo.php' method='post'>
	      <div>
	         <table style='width: 60%;background-color: #ffffff; margin-left: auto; margin-right: auto; height: 500px;'>

	            <tr>

	               <td><label for='name' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>이름</label></td>

	               <td><input type='text' value=".$data[2]." size='20' name='name' class='text-field' placeholder='이름' required/></td>

	            </tr>

	            <tr>

	               <td><label for='mail' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>이메일</label></td>

	               <td><input type='text' value=".$data[1]." size='16' name='mail' class='text-field' pattern = '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' title = 'example@email.com 형식으로 입력해주세요' placeholder='example@email.com' required/></td>

	            </tr>

	            <tr>

	               <td><label for='phone' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>휴대전화</label></td>

	               <td><input type='text' value=".$data[3]." size='20' name='phone' class='text-field' pattern = '[0-9]{2,3}-[0-9]{3,4}-[0-9]{3,4}' title = '012-3456-7891 형식으로 입력해주세요' placeholder='휴대전화' required/></td>

	            </tr>

	            <tr>

	               <td><label for='address' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>주소</label></td>

	               <td><input type='text' value=".$data[0]." size='30' name='address' class='text-field' placeholder='주소' required/></td>

	            </tr>

	            <tr>

	               <td colspan='2'><input type='submit' value='주문 등록' id='submit-btn'/></td>

	            </tr>
	           </table>
	          </div>
	    </form>";

}

$db->DBO();

$base->LayoutMain();
?>
