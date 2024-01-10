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

$sql = "SELECT count(*) FROM projects WHERE deleted = 1";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$activeProjects = $stmt->fetchColumn();

$sql = "SELECT count(*) FROM projects WHERE deleted = 0";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$deletedProjects = $stmt->fetchColumn();

$data = array(
    'activeProjects' => $activeProjects,
    'deletedProjects' => $deletedProjects
);

$jsonData = json_encode($data);

echo $jsonData;
?>