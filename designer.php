<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$db = new DBC;

$db->DBI();

$id = $_SESSION['id'];

$db->query = "SELECT title, body, CustomerID, GoodsID FROM feedback WHERE DesignerID = $id";

$db->DBQ();

if($db->result){//값이 존재할 경우

		//메인페이지에 출력한다
		while($data = $db->result->fetch_row()){//링크를 클릭하면 newbook.html로 이동
			$base->content .="<a href = './newbook.html'>
			title : ".$data[0]."<br/>body : ".$data[1]."</a>
			<br/>-------------------------<br/>";
		}
}


//상품 등록 페이지
$base->content .= "<form action='imgsavedemo.php' method='post' enctype='multipart/form-data'>

<fieldset>

	<p><label for='Title'>Item</label>
	<input type='text' id='Item' name='Item'
	maxlength='40' size='7' /></p>

	<p><label for='Title'>Category</label>
	<input type='text' id='Category' name='Category'
	maxlength='40' size='7' /></p>

	<p><label for='Title'>price</label>
	<input type='text' id='price' name='price'
	maxlength='40' size='7' /></p>

	<p><label for='Title'>color</label>
	<input type='text' id='color' name='color'
	maxlength='40' size='7' /></p>

	<p><label for='Title'>size</label>
	<input type='text' id='size' name='size'
	maxlength='40' size='7' /></p>

	<p><label for='Title'>material</label>
	<input type='text' id='material' name='material'
	maxlength='40' size='7' /></p>

	<p><label for='img'>img</label>
	<input type='file' name='img' id='img'/></p>

</fieldset>

<p><input type='submit' value='submit' /></p>
</form>";


$db->DBO();

$base->LayoutMain();
?>
