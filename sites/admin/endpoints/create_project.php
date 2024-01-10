<?php
try {
    $api_key = $_SERVER['HTTP_X_API_KEY'];

    $json = file_get_contents('../../../database.json');

    $data = json_decode($json, true);
  
    $real_api_key = $data['api_key'];

if ($api_key !== $real_api_key) {
    http_response_code(403);
    echo json_encode(['error' => 'Invalid API key']);
    exit;
}


  $username = $data['user'];
$password = $data['password'];

  $dbh = new PDO('mysql:host=localhost;dbname=portfolio', $username, $password);

    // Get the total number of projects
    $stmt = $dbh->query("SELECT COUNT(*) as total FROM projects");
    $total = $stmt->fetchColumn();

    // Insert a new project
    $new_id = $total + 1;
    $stmt = $dbh->prepare("INSERT INTO projects (idprojects, project, description, role, github, tags, deprecated, deleted) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$new_id, 'New Project', 'New Project Description', 'Developer', 'https://github.com/nhuijser', 'Tags, 1, 2', 0, 0]);
} catch (PDOException $e) {
    echo "<script>alert(Error: " . $e->getMessage() . ")</script>";
}
?>