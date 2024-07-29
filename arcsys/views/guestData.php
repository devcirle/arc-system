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

    <!-- Include jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

    <!-- Include DataTables CSS and JS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"> -->

    <!-- <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script> -->


<link href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/fh-4.0.1/r-3.0.2/datatables.min.css" rel="stylesheet">
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/fh-4.0.1/r-3.0.2/datatables.min.js"></script>

    <link rel="stylesheet" href="../styles/reset.css" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <link rel="stylesheet" href="../assets/css/data.css" />
    <!-- <link rel="stylesheet" href="../assets/css/datatables1.css" /> -->

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

      /* h2 {
        display: flex;
        justify-content: center;
        margin-top: 2.5rem;
        margin-bottom: 0;
      } */
    </style>

    <title>ARC SYSTEM</title>
  </head>
  <body>
    <div class="wrapper">
      <!-- <div class="header-wrapper">
        <div class="header">
          <img src="../assets/images/logo-dark.png" alt="" />
          <h1><a href="dashboard.php">ARC SYSTEM</a></h1>
        </div>
        <div class="title">
          <h2>DATA</h2>
        </div>
      </div> -->
      <div class="content">
        <div class="filters">
          <select name="" id="yearFilter">Filter</select>
          <select name="" id="monthFilter">Filter</select>
        </div>
        <table id="datatable" class="display compact">
          <thead>
            <tr>
              <th>DATE</th>
              <th>DISSOLVED OXYGEN</th>
              <th>TURBIDITY</th>
              <th>TOTAL DISSOLVED SOLIDS</th>
              <th>TEMPERATURE</th>
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
                <?= $row['created_at']; ?>
              </td>
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
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- <script>
          var table = $('#datatable').DataTable();
 
          new $.fn.dataTable.Responsive( table, {
              details: true
          } );
        </script> -->

        <script>
          $(document).ready(function () {
            var dataTable = $("#datatable").DataTable({
              responsive: true,
              order: [[5, "asc"]], // Sort by the sixth column (date) in ascending order
              dom: 'Bfrtip',
              buttons: [
                {
                    extend: 'excel',
                    // customize: function (xlsx) {
                    //     var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    //     $('row:last c', sheet).attr('s', '52');
                    //     var date = new Date().toLocaleString();
                    //     $('sheetData row:last c[r=A1]', sheet).after('<c r="A' + ($('sheetData row', sheet).length + 1) + '" s="52"><v>' + date + '</v></c>');
                    // }
                },
                {
                  extend: 'pdfHtml5',
                  customize: function (doc) {
                      var now = new Date().toLocaleString();
                      var footer = function(currentPage, pageCount) {
                          return {
                              text: now,
                              alignment: 'center'
                          };
                      };
                      doc.footer = footer;
                  }
                }
              ],


            paging: true,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 600
            });

            new $.fn.dataTable.FixedHeader( dataTable, {
                fixedHeader: true,
                fixedFooter: true,
            } );   

          var yearFilter = $("#yearFilter");
          var monthFilter = $("#monthFilter"); // New month filter

          yearFilter.append('<option value="">All Years</option>'); // Add an option for all years
          monthFilter.append('<option value="">All Months</option>'); // Add an option for all months

          for (var year = 2023; year <= new Date().getFullYear() + 1; year++) {
            yearFilter.append('<option value="' + year + '">' + year + "</option>");
          }

          var months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
          ];

          for (var i = 0; i < months.length; i++) {
            monthFilter.append(
              '<option value="' + (i + 1) + '">' + months[i] + "</option>"
            );
          }

          function applyFilters() {
            var selectedYear = yearFilter.val();
            var selectedMonth = monthFilter.val();

            // Clear any existing filtering
            dataTable.search("").columns().search("").draw();

            if (selectedYear || selectedMonth) {
              var regexPattern = "";
              
              if (selectedYear) {
                regexPattern += "^" + selectedYear;
              }
              if (selectedMonth) {
                var monthFormatted = selectedMonth.padStart(2, "0");
                regexPattern += "-" + monthFormatted;
              }

              dataTable.column(0).search(regexPattern, true, false).draw();
            }
          }

          yearFilter.on("change", applyFilters);
          monthFilter.on("change", applyFilters);

          document
            .getElementById("printButton")
            .addEventListener("click", function () {
              window.print();
            });
        });
</script>


        
      </div>
      <p class="definition">In the data view, users can sort by year and month to review specific periods, and have the option to download the recorded sensor data as either a PDF or Excel file for further analysis or record-keeping purposes.</p>
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
