<?php
    session_start();
        include("../components/connection.php");
        include("../components/functions.php");

        $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../styles/reset.css">
    <style>
        img {
            width: 200px;
            height: 200px;
        }
    </style>

    <title>Document</title>
</head>
<body>

    <?php 
        $query = "SELECT * FROM crayfishdata";
        $result = mysqli_query($con, $query);
        $query1 = $con->query("SELECT * FROM crayfishdata");
    ?>

    <?php foreach ($result as $row) : ?>

        <?php
        if($query1->num_rows > 0){
            while($item = $query1->fetch_assoc()){
                $imageURL = '../assets/images/data/'.$item["imagedata"];
        ?>
            <img src="<?php echo $imageURL; ?>" alt="" />
        <?php }
        }?>

            <?= $row['total_weight']; ?>

        <?php endforeach; ?>
    
</body>
</html>


