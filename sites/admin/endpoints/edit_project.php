<?php
     $json = file_get_contents('../../../database.json');
  $data = json_decode($json, true);

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