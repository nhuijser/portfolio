<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <script src="https://kit.fontawesome.com/0f6a8fd9b7.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/octicons@4.4.0/build/font/octicons.css">
  <script src="https://unpkg.com/@codersrank/activity@x.x.x/codersrank-activity.min.js"></script>
</head>

  <div id="background"></div>
  <title>nathan | portfolio</title>
 

  <div class="dark-mode-button">
    <i id="switch-icon" class="fa-solid fa-sun fa-xl" style="color: #ffffff;"></i>
  </div>
  <div class="header">
    <h1><strong>Nathan</strong></h1>
    <p class="type"><strong>Software Developer Student</strong></p>
    <p class="description">
      I'm passionate about building software that makes a difference in
      people's lives.
    </p>
    <p class="activityText">...</p>
    <codersrank-activity username="nhuijser" branding="false" weeks="21" tooltip legend class="activity">...</codersrank-activity>
  </div>
  


  <div class="right-section">
    <?php 
      $dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');
      $sql = "SELECT * FROM projects WHERE deleted = 0;";
      $result = $dbh->query($sql);
      $count = 0;

      foreach ($result as $row) {

        echo '<div class="section" id="projects">';
        if($row['deprecated'] == true) {
         echo '<div class="section-content-deprecated">';
        } else {
          echo '<div class="section-content">';
        }

        echo '
          <h3 class="role"><span>
            ' . $row['project'] . '</span><a href="' . $row['github'] . '"><i class="fa-brands fa-github fa-xl"></i></a>
          </h3>
          <h4 class="title">' . $row['role'] . '</h4>
          <p class="text-area">' . $row['description'] . '</p>';
      
          // Fetch tags from the database
          $tags = explode(', ', $row['tags']); // Assuming tags are stored as a comma-separated string
      
          echo '<div class="tags">';
          foreach ($tags as $tag) {
            echo '<script>console.log("' . $tag . '")</script>';
            if($tag == 'HTML') {
              $tag = '<i class="fa-brands fa-html5 fa-lg"></i> ' . $tag . '';
            } 
            if($tag == 'CSS') {
              $tag = '<i class="fa-brands fa-css3-alt fa-lg"></i> ' . $tag . '';
            } 
            if($tag == 'JavaScript') {
              $tag = '<i class="fa-brands fa-js-square fa-lg"></i> ' . $tag . '';
            }
            if($tag == 'PHP') {
              $tag = '<i class="fa-brands fa-php fa-lg"></i> ' . $tag . '';
            }
            if($tag == 'SQL') {
              $tag = '<i class="fa-solid fa-database fa-lg"></i> ' . $tag . '';
            }
            if($tag == 'Java') {
              $tag = '<i class="fa-brands fa-java fa-lg"></i> ' . $tag . '';
            }
            if($tag == 'DiscordJS') {
              $tag = '<i class="fa-brands fa-discord fa-lg"></i> <abbr title="Discord Library">' . $tag . '</abbr>';
            }
            if($tag == 'NodeJS') {
              $tag = '<i class="fa-brands fa-node-js fa-lg"></i> ' . $tag . '';
            }
            if($tag == 'Python') {
              $tag = '<i class="fa-brands fa-python fa-lg"></i> ' . $tag . '';
            }
            if($tag == 'C#') {
              $tag = '<i class="fa-brands fa-windows fa-lg"></i> ' . $tag . '';
            }
            if($tag == 'JSON') {
              $tag = '<i class="fa-solid fa-code fa-lg"></i> ' . $tag . '';
            }
            if($tag == 'SQLite') {
              $tag = '<i class="fa-solid fa-database fa-lg"></i> ' . $tag . '';
            }
            if($tag == 'MySQL') {
              $tag = '<i class="fa-brands fa-database fa-lg"></i> ' . $tag . '';
            }


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
      <p> <i class="fa-solid fa-envelope"></i> &#104;&#117;&#105;&#106;&#115;&#101;&#114;&#110;&#97;&#116;&#104;&#97;&#110;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;</p>
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

    function onData(event) {
      console.log(event.detail.total)
      document.getElementsByClassName('activityText')[0].innerHTML = '<strong>' + event.detail.total + '</strong> GitHub contributions in the last 21 weeks';
}
document.querySelector('.activity').addEventListener('data', onData);
</script>

</body>
</html>