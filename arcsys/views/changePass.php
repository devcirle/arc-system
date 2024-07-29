<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
        include("../components/connection.php");
        include("../components/functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $currPass = $_POST['currPass'];
		$password = $_POST['password'];
        $confirmPass = $_POST['confirmPass'];

		if(!empty($currPass) && !empty($password) && !empty($confirmPass))
		{
            if(isset($_SESSION['user_id'])){
                $id = $_SESSION['user_id'];
                // var_dump($id);
                $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";
                
                $result = mysqli_query($con, $query);

                if ($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);

                    if(password_verify($currPass, $user_data['pwd']))
                    {
                        if($password === $confirmPass){
                            $hashedPass = password_hash($password, PASSWORD_BCRYPT);
                            $user = $user_data['user_id'];
            
                            // $query = "INSERT INTO users (username, pwd, token) VALUES ('$username', '$hashedPass', '$user_id')";
                            $query = "UPDATE users SET pwd = '$hashedPass' WHERE user_id = '$user'";
            
                            mysqli_query($con, $query);
            
                            header("Location: ../index.php");
                            die;
                        }
                        echo "password does not match";
                    } else {
                        echo "Incorrect Current Password";
                    }
                }
            }
            
			
		} else
		{
			echo "Empty";
		}
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

    <title>Add User</title>
</head>
<body>
    <div class="back">
        <span onclick="window.location.href='menu.php'" class="material-symbols-outlined">arrow_back_ios_new</span>
    </div>
    <div class="logo-container">
        <!-- <img src="../assets/images/logo.png" alt="" /> -->
        <h1>CHANGE PASSWORD</h1>
    </div>

    <div class="input-fields">
        <form action="" method="post">
            <div class="input-card">
                <label for="currPass">Current Password:</label>
                <input class="input-bottom" type="text" name="currPass" id="currPass" placeholder="Current Password" required>
            </div>
    
            <div class="input-card">
                <label for="password">New Password:</label>
                <input class="input-bottom" type="password" name="password" id="password" placeholder="New Password" required>
            </div>
            
            <div class="input-card">
                <label for="confirmPass">Confirm New Password:</label>
                <input class="input-bottom" type="password" name="confirmPass" id="confirmPass" placeholder="Confirm New Password" required>
            </div>
            
            <div class="input-btns">
                <button>Save</button>
            </div>
            
        </form>
    </div>
</body>
</html>