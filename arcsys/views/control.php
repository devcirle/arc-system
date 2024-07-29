<?php
  session_start();
    include("../components/connection.php");
    include("../components/functions.php");

    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />

    <link rel="stylesheet" href="../styles/reset.css" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />

    <title>Dashboard</title>
  </head>
  <body>
    <div class="wrapper">
      <!-- <div class="header-wrapper">
        <div class="header">
          <img src="../assets/images/logo-dark.png" alt="" />
          <h1><a href="dashboard.php">ARC SYSTEM</a></h1>
        </div>
        <div class="title">
          <h2>CONTROL</h2>
        </div>
      </div> -->
      <div class="content">
        <iframe
          src="http://192.168.1.82:1880/ui/#!/1?socketid=PS3WeVgP38p8wzEEAAAS"
          frameborder="0"
        ></iframe>
      </div>
      <!-- <p class="definition">
        Vortex Filter->Mechanical Filter -- solenoid valve from vortex filter to mechanical filter. <br>
        Mechanical Filter->Bio Filter -- solenoid valve from mechanical filter to bio filter.
        <br>
        Bio Filter->Pond -- solenoid valve from bio filter to pond.
        <br>
        
      </p> -->
      <p class="definition">In the control view, users can effortlessly operate solenoid valves and water pumps, enabling them to adjust water flow and manage the crayfish's environment without any hassle.
      </p>
      <div class="nav-bar">
        <div class="headerNav">
          <span></span>
          <img src="../assets/images/banner.png" alt="">
          <!-- <h1>ARC SYSTEM</h1> -->
        </div>
        <nav>
          <li class="default">
            <a href="dashboard.php">
              <!-- <hr /> -->
              <div class="navBtn">
                <span class="material-symbols-outlined">dashboard</span>
                <h3>Dashboard</h3>
              </div>
            </a>
          </li>
          <li class="active">
            <a href="control.php">
              <!-- <hr /> -->
              <div class="navBtn">
                <span class="material-symbols-outlined">valve</span>
                <h3>Control</h3>
              </div>
            </a>
          </li>
          <li class="default">
            <a href="data.php">
              <!-- <hr /> -->
              <div class="navBtn">
                <span class="material-symbols-outlined">monitoring</span>
                <h3>Data</h3>
              </div>
            </a>
          </li>
          <li class="default">
            <a href="menu.php">
              <!-- <hr /> -->
              <div class="navBtn">
                <span class="material-symbols-outlined">menu</span>
                <h3>Menu</h3>
              </div>
            </a>
          </li>
        </nav>
      </div>
    </div>
  </body>
</html>

