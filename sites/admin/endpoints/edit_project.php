<?php
$dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');
$id = $_POST['id'];
$desc = $_POST['description'];
$project = $_POST['project']; // Step 1: Get the title from POST data
$sql = "UPDATE projects SET description = :desc, project = :project WHERE idprojects = :id"; // Step 2: Add a new parameter to the SQL query for the title
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':desc', $desc);
$stmt->bindParam(':project', $project); // Step 3: Bind the new parameter to the prepared statement
$stmt->execute(); // Step 4: Execute the statement
?>