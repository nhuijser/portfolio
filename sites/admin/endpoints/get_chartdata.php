<?php
    $api_key = $_SERVER['HTTP_X_API_KEY'];

    $json = file_get_contents('../../../database.json');

    $data = json_decode($json, true);
  
    $real_api_key = $data['api_key'];

if ($api_key !== $real_api_key) {
    http_response_code(403);
    echo 'Invalid API key';
    return;
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