<?php
    include("../components/connection.php");
    include("../components/functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $passwd = $_POST['password'];
        

        if(!empty($username) && !empty($passwd)){
            
            $token = "admin";
            $user_id = random_num(6);
            $hashedPass = password_hash($passwd, PASSWORD_BCRYPT);
            $query = "INSERT INTO users (username, pwd, token, user_id) VALUES ('$username', '$hashedPass', '$token', '$user_id')";
            
            mysqli_query($con, $query);

            header("Location: menu.php");
            die;
        } else {
            echo "Please enter your information";
        }
    }
?>