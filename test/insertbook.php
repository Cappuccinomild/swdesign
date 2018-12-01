<title>Book-o-book</title>
</head>
<body>
  <h1>book o rama book entry result</h1>
  <?php
  if(!isset($_POST['CustomerID']) || !isset($_POST['DesignerID'])
   ||!isset($_POST['GoodsID']) || !isset($_POST['Title'])
    || !isset($_POST['body'])) {
  echo "<p>you have not entered all the required details.<br />
  Please go back and try again.</p>";
     exit;
   }

  $CustomerID=$_POST['CustomerID'];
  $CustomerID=intval($CustomerID);
  $DesignerID=$_POST['DesignerID'];
  $DesignerID=intval($DesignerID);
  $GoodsID=$_POST['GoodsID'];
  $GoodsID=intval($GoodsID);
  $title=$_POST['Title'];
  $body=$_POST['body'];

  $db=mysqli_connect('localhost', 'root', '1234', 'test');

  if(mysqli_connect_errno()){
  echo"<p>Error: Could not connect to database.<br />
  please try again later.</p>";
  exit;
  }

  $query = "INSERT INTO feedback VALUES(?, ?, ?, ?, ?)";
  $stmt = $db->prepare($query);
  $stmt->bind_param('iiiss', $CustomerID, $DesignerID, $GoodsID, $title, $body);
  $stmt->execute();

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
