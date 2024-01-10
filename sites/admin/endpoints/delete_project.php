<?php
    $api_key = $_SERVER['HTTP_X_API_KEY'];

    echo '<script>console.log("API key: ' . $api_key . '")</script>';

    $json = file_get_contents('../../../database.json');

    $data = json_decode($json, true);
  
    $real_api_key = $data['api_key'];

    echo '<script>console.log("Real API key: ' . $real_api_key . '")</script>';

if ($api_key !== $real_api_key) {
    http_response_code(403);
    echo json_encode(['error' => 'Invalid API key']);
    return;
}


  $username = $data['user'];
$password = $data['password'];

  $dbh = new PDO('mysql:host=localhost;dbname=fullstack', $username, $password);
$id = $_POST['id'];
$sql = "UPDATE projects SET deleted = 1 WHERE idprojects = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
?>
