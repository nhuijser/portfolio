<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');

    // Get the total number of projects
    $stmt = $dbh->query("SELECT COUNT(*) as total FROM projects");
    $total = $stmt->fetchColumn();

    // Insert a new project
    $new_id = $total + 1;
    $dbh->exec("INSERT INTO projects (idprojects, project, description, deleted) VALUES ($new_id, 'New Project', 'New Project Description', 0)");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>