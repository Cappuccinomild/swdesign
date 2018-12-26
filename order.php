<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

//상품 id를 변수에 저장
$item_id=$_GET['item_id'];

//id가 없으면 로그인 페이지로 이동. 있으면 변수에 저장
if(!isset($_SESSION['id'])){
	echo "<script>alert('로그인이 필요합니다.');location.replace('./login.php');</script>";
}
else {
	$id=$_SESSION['id'];
}

$db = new DBC;

$db->DBI();

//상품 id에 해당하는 상품 정보를 읽어옴
$db->query = "select ItemName, price, color, size, material, DesignerID, IMG, thumb from item WHERE GoodsID = '".$item_id."'";

$db->DBQ();


if($db->result){//값이 존재할 경우
		$data = $db->result->fetch_row();
		$color=explode(',' ,$data[2]); //콤마로 분리하여 배열로 저장
		$size=explode(',' ,$data[3]); //콤마로 분리하여 배열로 저장
		$action="./order_process.php?item_id=".$item_id."&designer=".$data[5]; //action에 해당하는 주소 링크 저장

		//세부 상품 정보를 출력한다
		$base->content .="
		<h2>세부 상품 정보</h2>
		<form action=$action enctype='multipart/form-data' method='post'>
				<table class='item-table' style='width: 400px;'>
					<td style='border-right:1px solid gray;'><img src='".$data[7]."' alt='".$data[0]."' title='".$data[0]."' id='itemimg' width='120px' height='150px' style='margin-right: 50px; float:left;'/></td>
		      <td class='item-text' width='300%;'>주문 상품명 : ".$data[0]."<br/>디자이너 : ".$data[5]."<br/>색상 : <select name='color'>";

						foreach ($color as $value) { //foreach문으로 배열 출력
							$base->content.="<option value='".$value."'>".$value."</option>";
						}
					$base->content .="</select>	<br/>사이즈 : <select name='size'>";
						foreach ($size as $value) { //foreach문으로 배열 출력
							$base->content .="<option value='".$value."'>".$value."</option>";
						}
					$base->content .="</select><br/>가격 : ".$data[1]." 원</td>

		        </table>
						<br/><hr class='style-eight'/>";



}
else { //에러 출력
	echo "NO!";
	exit(1);
}

$db->DBO();


$db = new DBC;

$db->DBI();

//id에 해당하는 정보 입력받음
$db->query = "select address, mail, name, phone from member WHERE id = '".$id."'";

$db->DBQ();


if($db->result){//값이 존재할 경우

		$data = $db->result->fetch_row();

		//주문자의 정보 출력
			$base->content.="<h2>주문자 정보</h2>
	      <div>
	         <table style='width: 60%;background-color: #ffffff; margin-left: auto; margin-right: auto; height: 600px;'>

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

	               <td><label for='address' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>메모</label></td>

	               <td><textarea class='text-field' rows='10' cols='30' name='memo' placeholder='사이즈, 재료, 색상 등 디자이너님에게 원하는 요구사항을 적어주세요.\n주문 시 해당 메모로 상단의 피드백 진행 상품 탭에 게시글이 추가 되며 댓글을 통해 디자이너님과 피드백을 주고받을 수 있습니다.\nexample) 바지 총 기장을 샘플 M의 총 기장에서 5cm 줄여서 제작 가능한가요?'></textarea></td>

	            </tr>

							<tr>
		             <td><label for='img' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>이미지</label></td>
		             <td style='float: left;'><input type='file' multiple='multiple' name='img' id='img'/></td>
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
