<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
        include("../components/connection.php");
        include("../components/functions.php");
    
    $targetDir = "../assets/images/data/"; 

    if(isset($_POST["submit"])){
        // $filename = $_POST['image'];
        echo "Error Submit";
        if(!empty($_FILES["image"]["name"])){
            echo "Entered FILES";
            $fileName = basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
     
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif');
            $sizes = $_POST['sizes'];
            $values = implode(',', array_map(function ($size) use ($con) { return '(' . $con->real_escape_string($size) . ')'; }, $sizes));
            
            if(in_array($fileType, $allowTypes)){
                echo "Entered in Array";
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){ 
                    echo "Entered query";
                    $query = "INSERT INTO crayfishdata (imagedata, averagesize, growthrate) VALUES ('$fileName', '$values', '$values')";
                }
                mysqli_query($con, $query);
                
                header("Location: menu.php");
                die;
            }
        }
    } else {
        echo "Does not start";
    }
?>

<!-- HTML CODE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />

    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/uploadImage.css">
    <link rel="stylesheet" href="../assets/css/growthStats.css">

    <!-- <script src="../assets/js/uploadImage.js"></script> -->

    <title>Growth Stats</title>
</head>
<body>
    <div class="logo-container">
        <img src="../assets/images/logo.png" alt="" />
        <h1>ADD MEASUREMENT</h1>
    </div>

    <div class="input-fields">
        <form id="dataForm" action="" method="post" enctype="multipart/form-data">
            <figure class="image-container">
                <img id="chosen-image">
                <figcaption id="file-name"></figcaption>
            </figure>
            <input type="file" id="upload-button" name="image" accept="image/*">
            <label for="upload-button">
                <i class="fas fa-upload"></i> &nbsp; Choose A Photo
            </label>

            <!-- <input type="text" name="sizes[]" placeholder="Crayfish Size 1">
            <input type="text" name="sizes[]" placeholder="Crayfish Size 2"> -->

            <div class="data-input">
                <input type="text" name="sizes[]" required>
            </div>

            <div id="dynamicInputs"></div>

            <button type="button" onclick="addInput()">Add Another Data</button>
            <input type="submit" name="submit" value="Submit">
            <!-- <div class="input-btns">
                <button>Upload</button>
            </div> -->
            
        </form>
    </div>
    <script src="../assets/js/uploadImage.js"></script>
    <script src="../assets/js/growthStats.js"></script>

</body>

</html>