
<?php include('includes/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agent Login</title>
	<link rel="stylesheet" href="css/login.css">
</head>

<body>

	<div class="form-wrapper">
		<h3>Agent Login</h3>
		<form action="#" method="post">

			<div class="form-item">
				<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
			</div>

			<div class="form-item">
				<input type="password" name="pass" required="required" placeholder="Password" required></input>
			</div>

			<div class="button-panel">
				<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
			</div>
			<div class="button-panel">
				<span>Don't Have an Account</span>&nbsp;&nbsp;<a href="register.php" class="link">Register Here</a>
			</div>
		</form>
		<?php
		if (isset($_POST['login'])) {
			$username = mysqli_real_escape_string($conn, $_POST['user']);
			$password = mysqli_real_escape_string($conn, $_POST['pass']);

			$query 		= mysqli_query($conn, "SELECT * FROM login WHERE  password='$password' and username='$username' and usertype='agent'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);

			if ($num_row > 0) {
				$_SESSION['user_id'] = $row['user_id'];
				header('location:managecars.php');
			} else {
				echo 'Invalid Username and Password Combination';
			}
		}
		?>

	</div>

</body>

</html>