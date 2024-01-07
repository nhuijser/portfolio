<?php
$dbh = new PDO('mysql:host=localhost;dbname=portfolio', 'root', 'root');
$id = $_POST['id'];
$sql = "UPDATE projects SET deleted = 0 WHERE idprojects = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
?>