<?php
  session_start();
    include("../components/connection.php");
    include("../components/functions.php");

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
    <link rel="stylesheet" href="../assets/css/dropdown.css" />
    <link rel="stylesheet" href="../assets/css/menu.css" />

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
          <h2>ABOUT</h2>
        </div>
      </div> -->
      <div class="contentAbout">
        <span class="top"></span>
        <p><b >RECIRCULATING AQUACULTURE SYSTEM</b></p>
        <div class="explanation">
          <p>A recirculating aquaculture system (RAS) is a fish farming method that recycles water, using tanks or ponds and a filtration system to maintain water quality. It offers controlled conditions, efficient water use, and higher stocking densities compared to traditional methods.</p>
        </div>
        <p><b>COMPONENTS</b></p>
        <div class="components">
          <p><b>Pond</b> <br>- The Living Space for the Crayfish and where the water quality parameters located.</p>
          <p><b>Vortex Filtration</b> <br> - Pre-filter by separating larger solids through  circular motion.</p>
          <p><b>Mechanical Filtration</b> <br>- Captures suspended solids through screens or media.</p>
          <p><b>Biological Filtration</b> <br>- Employs beneficial bacteria to break down ammonia into nitrite and then nitrate using K1 Media.</p>
          <p><b>Aeration System</b> <br>- Ensures adequate dissolved oxygen level for crayfish.</p>
          <p><b>Sump</b> <br>- Reservoir for collecting water from the pond prior to recirculation into the system.</p>
          <p><b>Monitoring and Control System</b> <br>- Uses sensors and controllers to manage system parameters, pumps and solenoid valves.</p>
          <p><b>Feeder System</b> <br>- Automated device that dispense food for the crayfish.</p>
          <p><b>Solenoid Valves</b><br> - It control the water flow within the system.</p>
          <p><b>Azolla Pond</b> <br>- Provides supplemental feed and aids in nutrient recycling.</p>
        </div>
        <br>
        <p><b>ABOUT US</b></p>
        <div class="profiles">
          <div class="profile">
            <img src="../assets/images/duldulao.jpeg" alt="">
            <p>JAMES DULDULAO</p>
          </div>

          <div class="profile">
            <img src="../assets/images/fuentes.png" alt="">
            <p>ERIC FUENTES</p>
          </div>

          <div class="profile">
            <img src="../assets/images/gubac.jpeg" alt="">
            <p>NELJAN EARL GUBAC</p>
          </div>

          <div class="profile">
            <img src="../assets/images/guillermo.jpeg" alt="">
            <p>NEIL RITZSON GUILLERMO</p>
          </div>

          <div class="profile">
            <img src="../assets/images/valencia.jpeg" alt="">
            <p>JERICO VALENCIA</p>
          </div>

          <div class="profile">
            <img src="../assets/images/yoro.jpg" alt="">
            <p>RICHIE RITZ YORO</p>
          </div>

          <div class="profile">
            <img src="../assets/images/galutira.png" alt="">
            <p>DR. EDWIN GALUTIRA</p>
          </div>  
        </div>

      </div>
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
          <li class="default">
            <a href="guestData.php">
              <!-- <hr /> -->
              <div class="navBtn">
                <span class="material-symbols-outlined">monitoring</span>
                <h3>Data</h3>
              </div>
            </a>
          </li>
          <li class="active">
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

    <!-- javascript -->
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const dropdowns = document.querySelectorAll(".dropdown");

        dropdowns.forEach((dropdown) => {
          const select = dropdown.querySelector(".select");
          const caret = dropdown.querySelector(".caret");
          const menu = dropdown.querySelector(".menu");
          const options = dropdown.querySelectorAll(".menu li");
          const selected = dropdown.querySelector(".selected");

          select.addEventListener("click", () => {
            select.classList.toggle("select-clicked");
            caret.classList.toggle("caret-rotate");
            menu.classList.toggle("menu-open");
          });

          options.forEach((option) => {
            option.addEventListener("click", () => {
              selected.innerText = option.innerText;
              select.classList.remove("select-clicked");
              caret.classList.remove("caret-rotate");
              menu.classList.remove("menu-open");
              options.forEach((option) => {
                option.classList.remove("activeSel");
              });
              option.classList.add("activeSel");
            });
          });
        });
      });
    </script>
  </body>
</html>
