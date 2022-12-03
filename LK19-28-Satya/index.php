<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<form method="post" action="" name="signin-form">
	  <div class="form-element">
	    <label>Username</label>
	    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
	  </div>
	  <div class="form-element">
	    <label>Password</label>
	    <input type="password" name="password" required />
	  </div>
	  <button type="submit" name="login" value="login">Log In</button>
	  <div style="padding-top:50px">
		<a href="register.php">don't have account ? Register</a>
		</div>
	</form>

	<?php
    session_start();
    include('config.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM user WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                header("Location:frame.html");
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
    }
?>

</body>
</html>