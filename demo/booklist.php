<!DOCTYPE html>
<html>
<head>
  <title>search results</title>
</head>
<body>
  <h1>search results</h1>
  <?php
    $searchtype=$_POST['searchtype'];
    $searchterm=trim($_POST['searchterm']);

    if(!$searchterm || !$searchtype){
      echo '<p>input detail</p>';
      exit;
    }

    switch($searchtype){
      case 'GoodsID';
      case 'DesignerID';
      case 'CustomerID';
        break;
      default:
        echo '<p>that is not a valid type</p>';
        exit;
    }

    $db = new mysqli('localhost', 'root', '1234', 'test');
    if(mysqli_connect_errno()){
    echo"<p>Error: Could not connect to database.<br />
    please try again later.</p>";
    exit;
    }
    $query = "SELECT title, body FROM feedback
              WHERE $searchtype = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $searchterm);
    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($title, $body);

    while($stmt->fetch()){
        echo"<p><strong>title : ".$title."</strong>";
        echo"<br /> body : ".$body."</p>";
    }
    $stmt->free_result();
    $db->close();
   ?>
</body>
</html>
