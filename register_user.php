
<?php include('includes/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="form-wrapper">
        <h3>User Registration</h3>
        <form action="#" method="post">

            <div class="form-item">
                <input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
            </div>

            <div class="form-item">
                <input type="password" name="pass" required="required" placeholder="Password" required></input>
            </div>

            <div class="form-item">
                <input type="password" name="cpass" required="required" placeholder="Confirm Password" required></input>
            </div>

            <div class="button-panel">
                <input type="submit" class="button" title="register" name="register" value="Register"></input>
            </div>
            <div class="button-panel">
                <span>Already Have an account</span>&nbsp;&nbsp;<a href="user_login.php" class="link">Login</a>
            </div>
        </form>

        <?php
        if (isset($_POST['register'])) {

            // Getting input from Form

            $username = $_POST['user'];

            $password = $_POST['pass'];

            $cpassword = $_POST['cpass'];
            

            // command

            
            $sql = "INSERT INTO login SET
                                        username='$username',
                                        password='$password',
                                        usertype='user'
                                        ";

            $res = mysqli_query($conn, $sql);


            if ($res == TRUE) {
                $_SESSION['add'] = "Registration Successfully";
            } else {
                $_SESSION['add'] = "Failed to Register Try Again";
            }
        }
        ?>

</body>

</html>