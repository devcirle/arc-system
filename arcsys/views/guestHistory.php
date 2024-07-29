<?php
  session_start();
    include("../components/connection.php");
    // include("../components/functions.php");

    // $user_data = check_login($con);

    

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

    <title>Growth Data</title>
  </head>
  <body>
    <div class="wrapper">
      <!-- <div class="header-wrapper">
        <div class="header">
          <img src="../assets/images/logo-dark.png" alt="" />
          <h1><a href="dashboard.php">ARC SYSTEM</a></h1>
        </div>
        <div class="title">
          <h2>GROWTH DATA</h2>
        </div>
      </div> -->
      <div class="content">
        <div class="dataCard">
          <?php 
            $query = "SELECT * FROM crayfishdata";
            $result = mysqli_query($con, $query);
          ?>
          <?php foreach ($result as $row) : ?>
          <a href="#">
            <div class="card">
            
              <?php 
                $imgName = $row['imagedata']; 
                $imgPath = "../assets/images/data/" . $imgName;
              ?>
  
              <div>
                <img src="<?= $imgPath ?>" width=180>
              </div>
  
              <div class="summary">
                <!-- <a href="#"> -->
                  <?php
                    $createdAt = new DateTime($row['created_at']);
                    echo $createdAt->format('F d, Y');
                  ?>
                  <span>Live: <?= $row['dataCount']; ?></span>
                  <!-- <span>Dead: </span> -->
                  <span>Ave. Size: 
                    <?= 
                      $arrSum = round(((array_sum(array_map('intval', (explode('),(', (trim($row['ind_size'], '()'))))))) / $row['dataCount']), 2);
                    ?>
                  </span>
                  <span>Ave. Weight: 
                    <?= 
                      $arrSum = round(((array_sum(array_map('intval', (explode('),(', (trim($row['ind_weight'], '()'))))))) / $row['dataCount']), 2);
                    ?>
                  </span>
                  <!-- <button>Detailed View</button> -->
                <!-- </a> -->
              </div>
  
            </div>
          </a>
  
          <?php endforeach; ?>
        </div>

      </div>
      <p class="definition">In the monthly summary view, users can conveniently see summarized data on the size and weight of their crayfish, offering a clear picture of growth patterns over time.</p>
      <div class="nav-bar">
        <div class="headerNav">
          <span></span>
          <img src="../assets/images/banner.png" alt="">
          <!-- <h1>ARC SYSTEM</h1> -->
        </div>
        <nav>
          <li class="default">
            <a href="guestDash.php">
              <!-- <hr /> -->
              <div class="navBtn">
                <span class="material-symbols-outlined">dashboard</span>
                <h3>Dashboard</h3>
              </div>
            </a>
          </li>
          <li class="active">
            <a href="guestData.php">
              <!-- <hr /> -->
              <div class="navBtn">
                <span class="material-symbols-outlined">monitoring</span>
                <h3>Data</h3>
              </div>
            </a>
          </li>
          <li class="default">
            <a href="guestMenu.php">
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

