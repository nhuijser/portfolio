<?php
header('Content-Type: application/json');

// use db to select data

$dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');

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