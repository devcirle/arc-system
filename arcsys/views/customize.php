<?php
    session_start();
        include("../components/connection.php");
        include("../components/functions.php");

        $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == "POST") { 
      // something was posted 
      $species = $_POST['species']; 
      $oxygen = $_POST['oxygen']; 
      $turbidity = $_POST['turbidity'];
      $tds = $_POST['tds']; 
      $temperature = $_POST['temperature']; 
      
      $loweredSpecies = strtolower($species); 
      $upperFirst = ucfirst($loweredSpecies); 
      
      if(!empty($oxygen) && !empty($turbidity) && !empty($tds) && !empty($temperature)) { 
        $query = "INSERT INTO customidealparam (species,do,turbidity,tds,temperature) 
                VALUES ('$upperFirst', '$oxygen','$turbidity', '$tds', '$temperature')";
        mysqli_query($con, $query); 
        
        header("Location: menu.php"); 
        die; 
      } else { 
        echo "Enter Values"; } 
    } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--  -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
    <link rel="stylesheet" href="../styles/reset.css" />
    <link rel="stylesheet" href="../assets/css/login.css" />
    <!--  -->

    <title>Customize</title>
  </head>
  <body>
    <div class="back">
        <span onclick="window.location.href='menu.php'" class="material-symbols-outlined">arrow_back_ios_new</span>
    </div>
    <div class="logo-container">
      <!-- <img src="../assets/images/logo.png" alt="" /> -->
      <h1>ADD NEW PRESET</h1>
    </div>

    <div class="input-fields">
      <form action="" method="post">
        <div class="input-card">
          <label for="species">Species:</label>
          <input class="input-bottom" type="text" name="species" id="species" />
        </div>
        <div class="input-card">
          <label for="oxygen">Dissolved Oxygen (mg/L):</label>
          <input class="input-bottom" type="text" name="oxygen" id="oxygen" />
        </div>
        <div class="input-card">
          <label for="turbidity">Turbidity (NTU):</label>
          <input
            class="input-bottom"
            type="text"
            name="turbidity"
            id="turbidity"
          />
        </div>
        <div class="input-card">
          <label for="tds">Total Dissolved Solids (ppm):</label>
          <input class="input-bottom" type="text" name="tds" id="tds" />
        </div>
        <div class="input-card">
          <label for="temperature">Temperature (°C):</label>
          <input
            class="input-bottom"
            type="text"
            name="temperature"
            id="temperature"
          />
        </div>
        <div class="input-btns">
          <button>Save</button>
        </div>
      </form>
    </div>
  </body>
</html>
