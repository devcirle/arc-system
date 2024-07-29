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
    <link rel="stylesheet" href="../assets/css/newDashboard.css" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="../assets/css/datatables.css" />
    <link rel="stylesheet" href="../assets/css/content.css" />

    <style>
      @media print {
        body * {
          visibility: hidden;
        }

        #datatable_wrapper,
        #datatable_wrapper * {
          visibility: visible;
        }

        #datatable_wrapper {
          position: static;
        }

        br {
          display: none;
        }
      }

      .dataTables_wrapper {
        padding: 1rem;
      }

      h2 {
        display: flex;
        justify-content: center;
        margin-top: 2.5rem;
        margin-bottom: 0;
      }
    </style>

    <title>Data</title>
  </head>
  <body>
    <div class="container">
      <aside class="sidebar">
        <div class="brand">
          <img src="../assets/images/logo.png" alt="" />
          <h3>ARC System</h3>
        </div>
        <ul>
          <li class="default">
            <a href="newdashboard.php">
              <hr />
              <span class="material-symbols-outlined default-span"
                >dashboard</span
              >
              <h3>Dashboard</h3>
            </a>
          </li>
          <li class="default">
            <a href="n_control.html">
              <hr />
              <span class="material-symbols-outlined default-span">valve</span>
              <h3>Control</h3>
            </a>
          </li>
          <li class="active">
            <a href="n_data.php">
              <hr />
              <span class="material-symbols-outlined active-span"
                >monitoring</span
              >
              <h3>Data</h3>
            </a>
          </li>
          <li class="default">
            <a href="n_menu.html">
              <hr />
              <span class="material-symbols-outlined default-span">menu</span>
              <h3>Menu</h3>
            </a>
          </li>
        </ul>
      </aside>

      <div class="main-content">
        <span id="title">Data</span>

        <div class="content">
          <table id="datatable" class="display compact">
            <thead>
              <tr>
                <th>DO</th>
                <th>NTU</th>
                <th>TDS</th>
                <th>TEMP</th>
                <th>DATE</th>
              </tr>
            </thead>

            <tbody>
              <?php 
                  $query = "SELECT * FROM sensordata";
                  $result = mysqli_query($con, $query);
                ?>

              <?php foreach ($result as $row) : ?>
              <tr>
                <td>
                  <?= $row['oxygen']; ?>
                </td>
                <td>
                  <?= $row['turbidity']; ?>
                </td>
                <td>
                  <?= $row['tds']; ?>
                </td>
                <td>
                  <?= $row['temperature']; ?>
                </td>
                <td>
                  <?= $row['created_at']; ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>

  <script>
    $(document).ready(function () {
      var dataTable = $("#datatable").DataTable({
        order: [[4, "asc"]], // Sort by the fourth column (date) in descending order
      });

      var yearFilter = $("#yearFilter");

      yearFilter.append('<option value="">All Years</option>'); // Add an option for all years

      for (var year = 2023; year <= new Date().getFullYear() + 1; year++) {
        yearFilter.append('<option value="' + year + '">' + year + "</option>");
      }

      // Add a change event listener to the year filter select element
      yearFilter.on("change", function () {
        var selectedYear = $(this).val();

        // Clear any existing filtering
        dataTable.search("").columns().search("").draw();

        // Apply the selected year as a filter
        if (selectedYear !== "") {
          dataTable.column(3).search(selectedYear, true, false).draw();
        }
      });

      document
        .getElementById("printButton")
        .addEventListener("click", function () {
          window.print();
        });
    });
  </script>
</html>
