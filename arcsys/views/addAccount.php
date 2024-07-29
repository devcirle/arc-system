<?php
    session_start();
        include("../components/connection.php");
        include("../components/functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];
        $confirmPass = $_POST['confirmPass'];

		if(!empty($username) && !empty($password) && !empty($confirmPass))
		{
            if($password === $confirmPass)
            {
                $token = "admin";
                $user_id = random_num(6);
                $hashedPass = password_hash($password, PASSWORD_BCRYPT);

                $query = "INSERT INTO users (username, pwd, token, user_id) VALUES ('$username', '$hashedPass', '$token', '$user_id')";

                
                // NEW CODE
                // $query = "INSERT INTO users (username, pwd, token) VALUES ('$username', '$password', '')";

                mysqli_query($con, $query);

                header("Location: menu.php");
                die;
            }
            echo "wrong password don't match";
			
		}else
		{
			echo "wrong username or password!";
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
        <h1>ADD USER ACCOUNT</h1>
    </div>

    <div class="input-fields">
        <form action="" method="post">
            <div class="input-card">
                <label for="username">Username:</label>
                <input class="input-bottom" type="text" name="username" id="username" placeholder="Username" required>
            </div>
    
            <div class="input-card">
                <label for="password">Password:</label>
                <input class="input-bottom" type="password" name="password" id="password" placeholder="Password" required>
            </div>
            
            <div class="input-card">
                <label for="confirmPass">Confirm Password:</label>
                <input class="input-bottom" type="password" name="confirmPass" id="confirmPass" placeholder="Confirm Password" required>
            </div>
            
            <div class="input-btns">
                <button>Add Account</button>
            </div>
            
        </form>
    </div>
</body>
</html>