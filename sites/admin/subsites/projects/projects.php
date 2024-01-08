<?php 

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../../../login/login.php");
  exit;
}
?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="projects.css">
    <title>Admin Panel</title>
  </head>
  <body>
    <div class="admin-panel">
    <aside class="sidebar">
        <h1>Admin Dashboard</h1>
        <ul>
          <li><a href="../../admin.php">Dashboard</a></li>
          <li><a href="projects.php">Projects</a></li>
          <li><a href="../skills/skills.php">Skills</a></li>
          <li><a href="../../../logout/logout.php">Logout</a></li>
        </ul>
      </aside>
      <main class="main-content">
        <header>
          <h2>Projects</h2>
          <!-- add button to create project -->
          <button class="createButton" id="createButton"><i class="fas fa-plus fa-normal" style="color: #6d63f7;"></i></button>
        </header>
        <?php
  $dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');
  $sql = "SELECT * FROM projects";
  $result = $dbh->query($sql);


  while ($row = $result->fetch()) {
    echo "<script>console.log('" . $row['deleted'] . "')</script>";
    if($row['deleted'] == 1) {
    echo "<section class='content-deleted'>";
    echo "<div class='project-container-deleted'>";
    echo "<details>";
    echo "<summary>";
    echo  "<strong>" . $row['project'] . "</strong>";
    echo "</summary>";
    echo "<div class='project-deleted'>";
    echo "<p>" . $row['description'] . "</p>";
    echo "</div>";
    echo "</details>";
    echo '<div class="buttons">';
    echo '<button class="showButton" id="showButton" data-id="' . $row['idprojects'] . '"><i class="fa-regular fa-eye fa-normal" style="color: #6d63f7;"></i></button>';
    echo '</div>';
    echo "</div>";
    echo "</section>";
    } else if($row['deleted'] == 0) {
    echo "<section class='content'>";
    echo "<div class='project-container'>";
    echo "<details>";
    echo "<summary>";
    echo  "<strong>" . $row['project'] . "</strong>";
    echo "</summary>";
    echo "<div class='project-" . $row['idprojects'] . "'>";
    echo "<p>" . $row['description'] . "</p>";
    echo "</div>";
    echo "</details>";
    echo '<div class="buttons">';
    echo '<button class="deleteButton" id="deleteButton" data-id="' . $row['idprojects'] . '"><i class="fas fa-eye-slash fa-normal" style="color: #6d63f7;"></i></button>';
    echo '<button class="editButton" id="editButton" data-desc="' . $row['description'] . '" data-id="' . $row['idprojects'] . '"><i class="fas fa-edit fa-normal" style="color: #6d63f7;"></i></button>';
    echo '</div>';
    echo "</div>";
    echo "</section>";
    }
  }
          ?>
      </main>
    </div>
    <script>

      // existing code...

  // get all section elements
  const sections = document.querySelectorAll('section');

  sections.forEach((section) => {
    section.addEventListener('click', (event) => {
      console.log(event.target.tagName)
      if (event.target.tagName === 'BUTTON' || event.target.tagName === 'I' || event.target.tagName === 'INPUT' || event.target.tagName === "P") {
        return;
      }
      const details = section.querySelector('details');
      details.open = !details.open;
    });
  });

  const createButton = document.getElementById('createButton');

  if(createButton) {
    createButton.addEventListener('click', () => {
      console.log("Create button clicked");
      fetch('../../endpoints/create_project.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
      })
      .then(response => response.text())
      .then(data => {
        location.reload()
        console.log(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
    })
  }

  const deleteButtons = document.querySelectorAll('.deleteButton');

  deleteButtons.forEach((deleteButton) => {
    const projectId = deleteButton.dataset.id;
    deleteButton.addEventListener('click', () => {
      console.log("Delete button clicked");
      fetch('../../endpoints/delete_project.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + projectId,
      })
      .then(response => response.text())
      .then(data => {
        console.log(data);
        location.reload();
      })
      .catch((error) => {
        console.error('Error:', error);
      });
    })
  });

  const showButtons = document.querySelectorAll('.showButton');

  showButtons.forEach((showButton) => {
    const projectId = showButton.dataset.id;
    showButton.addEventListener('click', () => {
      console.log("Show button clicked");
      fetch('../../endpoints/show_project.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + projectId,
      })
      .then(response => response.text())
      .then(data => {
        console.log(data);
        location.reload();
      })
      .catch((error) => {
        console.error('Error:', error);
      });
    })
  });
    
  const editButtons = document.querySelectorAll('.editButton'); 
  editButtons.forEach((editButton) => {
    editButton.addEventListener('click', () => {
      console.log("Edit button clicked");

      const projectTitle = document.querySelector('.project-' + editButton.dataset.id).parentNode.querySelector('summary strong');
      projectTitle.contentEditable = true;
      projectTitle.focus();

      const projectDescription = document.querySelector('.project-' + editButton.dataset.id);
      projectDescription.contentEditable = true;
      projectDescription.focus();

      const summary = projectDescription.parentNode
      summary.open = true;

      const submitButton = document.createElement('button');
      submitButton.classList.add('btn');
      submitButton.innerHTML = '<i class="fas fa-check fa-normal" style="color: #00ff00;"></i>';

      const cancelButton = document.createElement('button');
      cancelButton.classList.add('btn');
      cancelButton.innerHTML = '<i class="fas fa-times fa-normal" style="color: #ff1900;"></i>';

      projectDescription.parentNode.appendChild(submitButton);
      projectDescription.parentNode.appendChild(cancelButton);

      submitButton.addEventListener('click', () => {
        console.log("Submit button clicked");
        fetch('../../endpoints/edit_project.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: 'id=' + editButton.dataset.id + '&project=' + projectTitle.innerHTML + '&description=' + projectDescription.innerHTML,
        })
        .then(response => response.text())
        .then(data => {
          console.log(data);
          location.reload();
        })
        .catch((error) => {
          console.error('Error:', error);
        });
      });

      // add event listener to the cancel button
      cancelButton.addEventListener('click', () => {
        console.log("Cancel button clicked");
        projectTitle.contentEditable = false;
        projectDescription.contentEditable = false;
        projectDescription.parentNode.removeChild(submitButton);
        projectDescription.parentNode.removeChild(cancelButton);

        // reset the project title and description

        fetch('../../endpoints/get_project.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: 'id=' + editButton.dataset.id,
        })
        .then(response => response.text())
        .then(data => {
          console.log(data);
          const project = JSON.parse(data);
          projectTitle.innerText = project.project;
          projectDescription.innerText = project.description;
        })
      });
    });
  });



  </script>
  </body>
  </html>

  <!-- import assets pic -->
  <script src="https://kit.fontawesome.com/0f6a8fd9b7.js" crossorigin="anonymous"></script>