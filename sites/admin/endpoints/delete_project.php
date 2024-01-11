<?php
 $json = file_get_contents('../../../database.json');

 $data = json_decode($json, true);

 $username = $data['user'];
 $password = $data['password'];

    $database = $data['database'];

    $dbh = new PDO('mysql:host=localhost;dbname=' . $database, $username, $password);
$id = $_POST['id'];
$sql = "UPDATE projects SET deleted = 1 WHERE idprojects = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
?>
