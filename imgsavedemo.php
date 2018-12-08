  <?php

    require_once './layout.inc';
    require_once './db.php';

    $base = new Layout;
    $base->link = './style.css';

  if( !isset($_POST['Item'])   ||!isset($_POST['Category'])
    ||!isset($_POST['price'])  ||!isset($_POST['color'])
    ||!isset($_POST['size'])    ||!isset($_POST['material'])
    ||!isset($_FILES['img']) !isset($_FILES['thumb']) )
    {
  echo "<p>you have not entered all the required details.<br />
  Please go back and try again.</p>";
     exit;
   }
  $DesignerID = $_SESSION['id'];
  $ItemName=$_POST['Item'];
  $CategoryID=$_POST['Category'];
  $price=intval($_POST['price']);
  $color=$_POST['color'];
  $size=$_POST['size'];
  $material=$_POST['material'];

  //get goodsID 아직구현안됨
  $GoodsID = 0;





  $imglink = $_SERVER['DOCUMENT_ROOT'].'/images/'.$GoodsID;
  $thumblink = $_SERVER['DOCUMENT_ROOT'].'/images/th'.$GoodsID;
   // 파일 입력 설정
   $allowed_ext = array('jpg','jpeg','png','gif');

   // 변수 정리
   //이미지
   $error = $_FILES['img']['error'];
   $name = $_FILES['img']['name'];
   $ext = array_pop(explode('.', $name));

   //썸네일
   $therror = $_FILES['img']['error'];
   $thname = $_FILES['img']['name'];
   $thext = array_pop(explode('.', $name));
   
   // 오류 확인
   if( $error != UPLOAD_ERR_OK ) {
   	switch( $error ) {
   		case UPLOAD_ERR_INI_SIZE:
   		case UPLOAD_ERR_FORM_SIZE:
   			echo "<script>alert('파일이 너무 큽니다.');history.back();</script>";
   			break;
   		case UPLOAD_ERR_NO_FILE:
   			echo "<script>alert('파일이 첨부되지 않았습니다.');history.back();</script>";
   			break;
   		default:
   			echo "<script>alert('파일이 제대로 업로드되지 않았습니다.');history.back();</script>";

   	}
   	exit;
   }

   // 확장자 확인
   if( !in_array($ext, $allowed_ext) ) {
   	echo "<script>alert('허용되지 않는 확장자입니다.');history.back();</script>";
   	exit;
   }

   // 파일 이동
   move_uploaded_file( $_FILES['img']['tmp_name'], $imglink.".".$ext);

   $place = "";
   $place =  $GoodsID.".".$ext;


   $db = new DBC;

   $db->DBI();

   $link = 0;
   //$db->query = "INSERT INTO item VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
   $db->query = "INSERT INTO item VALUES('".$GoodsID."', '".$CategoryID."', '".$ItemName."', '".$price."',
    '".$color."','".$size."', '".$material."', '".$DesignerID."', '".$place."', '')";//이미지링크 추가해야함



   //등록 여부 출력
  $db->DBQ();
  if(!$db->result){//실패
    echo "<script>alert('등록 실패');history.back();</script>";

    $db->DBO();

    exit;
  }
  else {//등록 완료
    echo "<script>alert('제품 : ".$ItemName." 등록 완료.');location.replace('./designer.php');</script>";

  	$db->DBO();

  	exit;
  }
  $db->close();

?>
</body>
</html>
