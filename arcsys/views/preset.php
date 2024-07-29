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
          <h2>PRESET</h2>
        </div>
      </div> -->
      <div class="content">
        <div class="presets">
          <select id="presetSelect">
            <?php 
              $query = "SELECT * FROM customidealparam";
              $result = mysqli_query($con, $query);
            ?>
            
            <?php foreach ($result as $row) : ?>
  
              <option value="<?= "(" . $row['species'] . "),(" . $row['do'] . "),(" . $row['turbidity'] . "),(" . $row['tds'] . "),(" . $row['temperature'] . ")" ?>"><?= $row['species']  ?></option>
  
            <?php endforeach; ?>
            
              <!-- Add more options as needed -->
          </select>
          <button onclick="sendPreset()">Change Preset</button>
        </div>
      </div>
      <p class="definition">In the change preset feature, users can switch the default crayfish species to another species of their choice and adjust the ideal sensor parameters to better suit the specific needs of their selected species without any technical complexity.</p>
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
          <li class="default">
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
          <li class="active">
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

<script>
        function sendPreset() {

            const selectElement = document.getElementById('presetSelect');
            const selectedPreset = selectElement.value;

            fetch('http://192.168.1.82:1880/preset', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ preset: selectedPreset })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>

