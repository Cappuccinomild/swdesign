<title>Book-o-book</title>
</head>
<body>
  <h1>book o rama book entry result</h1>
  <?php

  if( !isset($_POST['price']) || !isset($_POST['Category'])
    ||!isset($_POST['Item'])  ||isset($_POST['color'])
    ||isset($_POST['size'])    ||isset($_POST['material'])
    ||isset($_POST['img']) ){
  echo "<p>you have not entered all the required details.<br />
  Please go back and try again.</p>";
     exit;
   }
  $DesignerID = $_SESSION['id'];
  $Item=$_POST['Item'];
  $CategoryID=$_POST['Category'];
  $price=$_POST['price'];
  $color=$_POST['color'];
  $size=$_POST['size'];
  $material=$_POST['material'];

  //get goodsID
  $GoodsID = 0;





  $imglink = $_SERVER['DOCUMENT_ROOT'].'/images/'.$GoodsID;

  $db=mysqli_connect('localhost', 'root', '1234', 'test');

  if(mysqli_connect_errno()){
  echo"<p>Error: Could not connect to database.<br />
  please try again later.</p>";
  exit;
  }
  $link = 0;
  $query = "INSERT INTO item VALUES(?, ?, ?, ?, ?, ?)";
  $stmt = $db->prepare($query);
  $stmt->bind_param('isssssss', $Goodsid, $CategoryID, $Item, $price, $color, $size, $material, $DesignerID);
  $stmt->execute();

  // 설정

  $allowed_ext = array('jpg','jpeg','png','gif');

  // 변수 정리
  $error = $_FILES['img']['error'];
  $name = $_FILES['img']['name'];
  $ext = array_pop(explode('.', $name));

  // 오류 확인
  if( $error != UPLOAD_ERR_OK ) {
  	switch( $error ) {
  		case UPLOAD_ERR_INI_SIZE:
  		case UPLOAD_ERR_FORM_SIZE:
  			echo "파일이 너무 큽니다. ($error)";
  			break;
  		case UPLOAD_ERR_NO_FILE:
  			echo "파일이 첨부되지 않았습니다. ($error)";
  			break;
  		default:
  			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
  	}
  	exit;
  }

  // 확장자 확인
  if( !in_array($ext, $allowed_ext) ) {
  	echo "허용되지 않는 확장자입니다.";
  	exit;
  }

  // 파일 이동
  move_uploaded_file( $_FILES['img']['tmp_name'], $imglink.".".$ext);

  if($stmt->affected_rows > 0){
    echo "<p>book insterted into the database.</p>";
  } else {
  echo "<p>an error has occurred.<br/>
  the item was not added.</p>";
  }
  $db->close();
?>
</body>
</html>
