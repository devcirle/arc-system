<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
        include("../components/connection.php");
        include("../components/functions.php");
    
    $targetDir = "../assets/images/data/"; 

    if(isset($_POST["submit"])){
        // $filename = $_POST['image'];
        // echo "Error Submit";
        if(!empty($_FILES["image"]["name"])){
            // echo "Entered FILES";
            $fileName = basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
     
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif');
            $weights = $_POST['weights'];
            $sizes = $_POST['sizes'];

            $length = count($sizes);
            
            // $sizes = $_POST['sizes[]'];
            $valWeight = implode(',', array_map(function ($weight) use ($con) { return '(' . $con->real_escape_string($weight). ')'; }, $weights)); 
            $valSize = implode(',', array_map(function ($size) use ($con) { return '(' . $con->real_escape_string($size). ')'; }, $sizes)); 

            if(in_array($fileType, $allowTypes)){ 
              if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                $query = "INSERT INTO crayfishdata (imagedata, dataCount, ind_size, ind_weight) 
                          VALUES ('$fileName', '$length', '$valSize', '$valWeight')"; 
              }
              
              mysqli_query($con, $query); 
              header("Location: menu.php"); 
              die; 
            } 
      } 
    } 
?>

<!-- HTML CODE -->
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
    <link rel="stylesheet" href="../assets/css/login.css" />
    <link rel="stylesheet" href="../assets/css/uploadImage.css" />
    <link rel="stylesheet" href="../assets/css/growthStats.css" />

    <!-- <script src="../assets/js/uploadImage.js"></script> -->

    <title>Growth Stats</title>
  </head>
  <body>
    <div class="back">
        <span onclick="window.location.href='menu.php'" class="material-symbols-outlined">arrow_back_ios_new</span>
    </div>
    <div class="logo-container">
      <!-- <img src="../assets/images/logo.png" alt="" /> -->
      <h1>ADD DATA</h1>
    </div>

    <div class="input-fields">
      <form id="dataForm" action="" method="post" enctype="multipart/form-data">
        <figure class="image-container">
          <img id="chosen-image" />
          <!-- <figcaption id="file-name"></figcaption> -->
        </figure>
        <label class="upload-img labels" for="upload-button">
          <i class="fas fa-upload"></i> &nbsp; Choose a Photo
        </label>
        <input type="file" id="upload-button" name="image" accept="image/*" />

        <div class="initial">
          <div class="input-card">
            <label for="sizes[]">Size(inch):</label>
            <input class="inputs" type="text" inputmode="numeric" name="sizes[]" required>
          </div>
          <div class="input-card">
            <label for="weights[]">Weight(grams):</label>
            <input class="inputs" type="text" name="weights[]" required>
          </div>
        </div>


        <div id="dynamicInputs"></div>

        <button class="add" type="button" onclick="addInput()">
          <span class="material-symbols-outlined">
            add
          </span>
        </button>
        <input class="sbmt-btn" type="submit" name="submit" value="Upload Data" />
        <!-- <div class="input-btns">
                <button>Upload</button>
            </div> -->
      </form>
    </div>
    <script src="../assets/js/uploadImage.js"></script>
    <script src="../assets/js/growthStats.js"></script>
  </body>
</html>
