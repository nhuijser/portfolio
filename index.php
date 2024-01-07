<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  </head>
  <body>
    <div id="background"></div>
    <title>nathan | portfolio</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
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
    <!-- particles -->
    <div class="dark-mode-button">
      <i
        id="moon-icon"
        class="fa-solid fa-moon fa-2xl"
        style="color: #ffffff"
      ></i>
    </div>
    <div class="header">
      <h1><strong>Nathan</strong></h1>
      <p class="type"><strong>Software Developer Student</strong></p>
      <p class="description">
        I'm passionate about building software that makes a difference in
        people's lives.
      </p>
    </div>

    <div class="nav">
      <strong>
        <ul>
          <a href="#about"
            ><li><p>━ About me</p></li></a
          >
          <a href="#projects"
            ><li><p>━ Projects</p></li></a
          >
          <a href="#contact"
            ><li><p>━ Contact</p></li></a
          >
        </ul>
      </strong>
    </div>

    <div class="right-section">
      <div class="section" id="projects">
        <div class="section-content">
          <h3 class="role">
            balls.com<a href="https://github.com/nhuijser"><i class="fa-brands fa-github fa-xl"></i></a>
          </h3>
          <h4 class="title">Senior Developer</h4>
          <p class="text-area">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae
            minima iure ipsum eligendi sapiente tempore corporis possimus. Esse,
            hic debitis? Similique blanditiis sunt delectus, deserunt eaque
            quisquam alias?
          </p>
        </div>
      </div>
      <div class="section" id="projects">
        <div class="section-content">
          <h3 class="role">
            balls.com<a href="https://github.com/nhuijser"><i class="fa-brands fa-github fa-xl"></i></a>
          </h3>
          <h4 class="title">Senior Developer</h4>
          <p class="text-area">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae
            minima iure ipsum eligendi sapiente tempore corporis possimus. Esse,
            hic debitis? Similique blanditiis sunt delectus, deserunt eaque
            quisquam alias?
          </p>
        </div>
      </div>
      <div class="section" id="projects">
        <div class="section-content">
          <h3 class="role">
            balls.com<a href="https://github.com/nhuijser"><i class="fa-brands fa-github fa-xl"></i></a>
          </h3>
          <h4 class="title">Senior Developer</h4>
          <p class="text-area">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae
            minima iure ipsum eligendi sapiente tempore corporis possimus. Esse,
            hic debitis? Similique blanditiis sunt delectus, deserunt eaque
            quisquam alias?
          </p>
        </div>
      </div>
      <div class="section" id="contact">
        <div class="section-content" >
          <h3 class="contact">Contact</h3>
          <div class="contact-details">
            <p><a href="mailto:huijsernathan@gmail.com" class="email-button"><i class="fa-solid fa-envelope"></i> huijsernathan@gmail.com</a></p>
        </div>
      </div>
      <script src="./script.js"></script>
    </div>
  </body>
</html>

<script
  src="https://kit.fontawesome.com/0f6a8fd9b7.js"
  crossorigin="anonymous"
></script>
