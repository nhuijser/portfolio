<?php
    $json = file_get_contents('../../../database.json');

    $data = json_decode($json, true);

    $username = $data['user'];
    $password = $data['password'];

  $dbh = new PDO('mysql:host=localhost;dbname=portfolio', $username, $password);
$id = $_POST['id'];
$sql = "UPDATE projects SET deleted = 0 WHERE idprojects = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
?>