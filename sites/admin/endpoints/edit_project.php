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
$id = $_POST['id'];
$description = $_POST['description'];
$github = $_POST['github'];
$role = $_POST['role'];
$tags = $_POST['tags'];
$project = $_POST['project']; // Step 1: Get the title from POST data
$sql = "UPDATE projects SET description = :description, project = :project, github = :github, role = :role, tags = :tags WHERE idprojects = :id"; // Step 2: Add a new parameter to the SQL query for the title
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':github', $github);
$stmt->bindParam(':tags', $tags);
$stmt->bindParam(':role', $role);
$stmt->bindParam(':project', $project); // Step 3: Bind the new parameter to the prepared statement
$stmt->execute(); // Step 4: Execute the statement
?>