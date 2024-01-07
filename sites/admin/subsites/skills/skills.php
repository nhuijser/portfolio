<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="skills.css">
    <title>Admin Panel</title>
  </head>
  <body>
    <div class="admin-panel">
    <aside class="sidebar">
        <h1>Admin Dashboard</h1>
        <ul>
          <li><a href="../../admin.php">Dashboard</a></li>
          <li><a href="../projects/projects.php">Projects</a></li>
          <li><a href="../skills/skills.php">Skills</a></li>
          <li><a href="../../../logout/logout.php">Logout</a></li>
        </ul>
      </aside>
      <main class="main-content">
        <header>
          <h2>Skills</h2>
        </header>
        <div class="front-end">
          <header>
            <h3>Front-End</h3>
          </header>
          
        </div>
      </main>
    </div>
  </body>
  </html>

  <!-- import assets pic -->
  <script src="https://kit.fontawesome.com/0f6a8fd9b7.js" crossorigin="anonymous"></script>


<?php 

session_start();


if($_SESSION["loggedin"] === false){
  header("location: ../../login/login.php");
  exit;
}

?>