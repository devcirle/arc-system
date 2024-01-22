<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../styles/reset.css">
    <title>RAS Crayfish</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../assets/images/logo.png">
                    <!-- <h2>Crayfish</h2> -->
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="index.php">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="control.php">
                    <span class="material-symbols-outlined">
                        valve
                    </span>
                    <h3>Control</h3>
                </a>
                <a href="data.php">
                    <span class="material-symbols-outlined">
                        monitoring
                    </span>
                    <h3>Data</h3>
                </a>
                <a href="notification.php">
                    <span class="material-symbols-outlined">
                        notifications
                    </span>
                    <h3>Notifications</h3>
                </a>
                <a href="customize.php">
                    <span class="material-symbols-outlined">
                        settings
                    </span>
                    <h3>Customize</h3>
                </a>
                <a href="about.php" class="active">
                    <span class="material-symbols-outlined">
                        info
                    </span>
                    <h3>About</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
              <h3>About</h3>
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
            </div>
        </div>


    </div>

    <script src="../assets/js/orders.js"></script>
    <script src="../assets/js/index.js"></script>
</body>

</html>