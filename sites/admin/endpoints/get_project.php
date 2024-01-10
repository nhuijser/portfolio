<?php
 $json = file_get_contents('../../../database.json');

 $data = json_decode($json, true);

 $allowedIP = $data['allowedIP'];

 $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
 
 if($ip_address != $allowedIP) {
     echo "You are not authorized to access this page.";
     exit;
 }

 $username = $data['user'];
 $password = $data['password'];

$dbh = new PDO('mysql:host=localhost;dbname=portfolio', $username, $password);
$id = $_POST['id'];
$sql = "UPDATE projects SET deleted = 0 WHERE idprojects = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
?>