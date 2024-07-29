

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
          <h2>MENU</h2>
        </div>
      </div> -->
      <div class="content">
        <div class="dropdown">
          <div class="select">
            Growth Stats
            <div class="caret"></div>
          </div>
          <ul class="menu">
            <li onclick="window.location.href='guestHistory.php'">
              View Data
            </li>
          </ul>
        </div>
        <a href="guestAbout.php">
          <button class="about-btn">About</button>
        </a>

        <a href="logout.php"><button class="logout-btn">Log Out</button></a>
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
