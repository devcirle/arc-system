<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

	include("../components/connection.php");
	include("../components/functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['passwd'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "select * from users where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

          // if($user_data['pwd'] === $password)
          if(password_verify($password, $user_data['pwd']))
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: dashboard.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

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
    <link rel="stylesheet" href="../assets/css/login.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="logo-container">
      <img src="../assets/images/logo.png" alt="" />
      <h1>ARC SYSTEM</h1>
    </div>

    <div class="input-fields">
      <form action="" method="post">
        <input
          class="input-bottom"
          type="text"
          name="username"
          id="username"
          placeholder="Username"
        />
  
        <input
          class="input-bottom"
          type="password"
          name="passwd"
          id="passwd"
          placeholder="Password"
        />
  
      <div class="input-btns">
          <button>Log In</button>
          <a href="guestDash.php">Log in as Guest</a>
          <!-- <a href="">Forgot Password?</a> -->
      </div>
      </form>
  </body>
</html>