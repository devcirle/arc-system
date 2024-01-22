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

    <title>Control</title>
  </head>
  <body>
    <div class="container">
      <nav>
        <li class="default">
          <a href="dashboard.php">
            <hr />
            <span class="material-symbols-outlined">dashboard</span>
            <h3>Dashboard</h3>
          </a>
        </li>
        <li class="active">
          <a href="">
            <hr />
            <span class="material-symbols-outlined">valve</span>
            <h3>Control</h3>
          </a>
        </li>
        <li class="default">
          <a href="data.php">
            <hr />
            <span class="material-symbols-outlined">monitoring</span>
            <h3>Data</h3>
          </a>
        </li>
        <li class="default">
          <a href="menu.php">
            <hr />
            <span class="material-symbols-outlined">menu</span>
            <h3>Menu</h3>
          </a>
        </li>
      </nav>
      <div class="content">
        <iframe
          src="http://192.168.1.82:1880/ui/#!/1?socketid=fu1yJuzWp4F92oKlAAAA"
          frameborder="0"
        ></iframe>
      </div>
    </div>
  </body>
</html>
