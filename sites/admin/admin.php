<?php 

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../login/login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.umd.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel</title>
</head>
<body>
  <div class="admin-panel">
    <aside class="sidebar">
      <h1>Admin Dashboard</h1>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="./subsites/projects/projects.php">Projects</a></li>
        <li><a href="./subsites/skills/skills.php">Skills</a></li>
        <li><a href="../logout/logout.php">Logout</a></li>
      </ul>
    </aside>
    <main class="main-content">
      <section class="content">
        <header>Projects</header>
        <canvas id="myChart" width="200" height="100"></canvas>
      </section>
    </main>
  </div>
  <script type="text/javascript" async>
  const ctx = document.getElementById('myChart');

  const getData = async () => {
    const response = await fetch('./endpoints/get_chartdata.php');
    const data = await response.json();
    return data;
  }

   getData().then(chartData => {

    const active = chartData.activeProjects;
    const inactive = chartData.deletedProjects;

  const data = {
  labels: [
    'Active',
    'Inactive',
  ],
  datasets: [{
    label: 'Projects',
    data: [inactive, active],
    backgroundColor: [
      'rgb(54, 162, 235)',
      'rgb(255, 99, 132)',
    ],
    hoverOffset: 4
  }]
};

const config = {
  type: 'doughnut',
  data: data,
  options: {
    plugins: {
      legend: {
        display: true,
        position: 'bottom',
        labels: {
        color: 'white',
        padding: 20,
        font: {
          size: 18
        }
      }
    }
    }
  },
};

var myDoughnut = new Chart(ctx, config);


  })


</script>
</body>
</html>