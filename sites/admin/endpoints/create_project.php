<?php
try {
    
    $json = file_get_contents('../../../database.json');

    $data = json_decode($json, true);

    echo "<script>console.log('" . $data['user'] . "')</script>";

    $username = $data['user'];
    $password = $data['password'];

    echo "<script>console.log('" . $username . "')</script>";
    echo "<script>console.log('" . $password . "')</script>";

  $dbh = new PDO('mysql:host=localhost;dbname=portfolio', $username, $password);

    // Get the total number of projects
    $stmt = $dbh->query("SELECT COUNT(*) as total FROM projects");
    $total = $stmt->fetchColumn();

    // Insert a new project
    $new_id = $total + 1;
    $stmt = $dbh->prepare("INSERT INTO projects (idprojects, project, description, role, github, tags, deprecated, deleted) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$new_id, 'New Project', 'New Project Description', 'Developer', 'https://github.com/nhuijser', 'Tags, 1, 2', 0, 0]);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . ")";
}
?>