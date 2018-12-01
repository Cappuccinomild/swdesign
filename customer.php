<?php

require_once './layout.inc';
require_once './db.php';

$base = new Layout;
$base->link = './style.css';

$CustomerID = $_SESSION['id'];

$db = new mysqli('localhost', 'root', '1234', 'test');
$query = "SELECT title, body FROM feedback
					WHERE CustomerID = $CustomerID";

$stmt = $db->prepare($query);

while($stmt->fetch()){
		echo"<p><strong>title : ".$title."</strong>";
		echo"<br /> body : ".$body."</p>";
}

$stmt->free_result();
$db->close();

$base->LayoutMain();

?>
