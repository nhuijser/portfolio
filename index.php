<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <script src="https://kit.fontawesome.com/0f6a8fd9b7.js" crossorigin="anonymous"></script>
</head>
  <div id="background"></div>
  <title>nathan | portfolio</title>
 

  <div class="dark-mode-button">
    <i id="switch-icon" class="fa-solid fa-sun fa-2xl" style="color: #ffffff;"></i>
  </div>
  <div class="header">
    <h1><strong>Nathan</strong></h1>
    <p class="type"><strong>Software Developer Student</strong></p>
    <p class="description">
      I'm passionate about building software that makes a difference in
      people's lives.
    </p>
  </div>


  <div class="right-section">
    <?php 
      $dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');
      $sql = "SELECT * FROM projects WHERE deleted = 0;";
      $result = $dbh->query($sql);
      $count = 0;

      foreach ($result as $row) {
        echo '<div class="section" id="projects">
        <div class="section-content">
          <h3 class="role"><span>
            ' . $row['project'] . '</span><a href="' . $row['github'] . '"><i class="fa-brands fa-github fa-xl"></i></a>
          </h3>
          <h4 class="title">' . $row['role'] . '</h4>
          <p class="text-area">' . $row['description'] . '</p>';
      
          // Fetch tags from the database
          $tags = explode(',', $row['tags']); // Assuming tags are stored as a comma-separated string
      
          echo '<div class="tags">';
          foreach ($tags as $tag) {
            echo '<p>' . $tag . '</p>';
          }
          echo '</div>';
      
      echo '</div>
      </div>';
      }
    ?>

  <div class="section" id="contact">
    <div class="section-content">
      <h3 class="contact">Contact</h3>
      <div class="contact-details">
        <p><a href="mailto:huijsernathan@gmail.com" class="email-button"><i class="fa-solid fa-envelope"></i> huijsernathan@gmail.com</a></p>
      </div>
    </div>
  </div>
  </div>

  <script src="./script.js"></script>
  <div id="particles-js"></div>

<!-- particles -->
<script>
  particlesJS.load(
    "particles-js",
    "./particles/particles.json",
    function () {
      console.log("particles.json loaded...");
    }
  );
</script>
</body>
</html>