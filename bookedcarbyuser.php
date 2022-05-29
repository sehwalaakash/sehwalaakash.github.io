<?php include('includes/constants.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booked User Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
        li {
            display: inline;
            list-style-type: none;
            padding: 0 5%;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>Rental</span></a></h2></a>
       
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="managecars.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="addcars.php">Add Cars</a>
                <a class="nav-item nav-link" href="bookedcarbyuser.php">Booked Cars</a>
                <a class="nav-item nav-link" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add']; // Displaying Session Message
        unset($_SESSION['add']);  // Removing Session Message
    }
    if (isset($_SESSION['delete'])) {
        echo $_SESSION['delete']; // Displaying Session Message
        unset($_SESSION['delete']); // Removing Session Message
    }
    if (isset($_SESSION['update'])) {
        echo $_SESSION['update']; // Displaying Session Message
        unset($_SESSION['update']);  // Removing Session Message
    }
    if (isset($_SESSION['user-not-found'])) {
        echo $_SESSION['user-not-found']; // Displaying Session Message
        unset($_SESSION['user-not-found']);  // Removing Session Message
    }
    if (isset($_SESSION['password-not-match'])) {
        echo $_SESSION['password-not-match']; // Displaying Session Message
        unset($_SESSION['password-not-match']);  // Removing Session Message
    }
    if (isset($_SESSION['change-password'])) {
        echo $_SESSION['change-password']; // Displaying Session Message
        unset($_SESSION['change-password']);  // Removing Session Message
    }
    ?>

    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Vehicle Model</th>
                <th scope="col">Vehicle Number</th>
                <th scope="col">Seating Capacity</th>
                <th scope="col">Time Interval</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // Query to Get all the Cars
            $sql  = "SELECT * FROM carsrent";
            // Execute the Query
            $res = mysqli_query($conn, $sql);
            // Check whether the Query is executed or not
            if ($res == TRUE) {
                // Count Rows to check whether we have data in the Database or not
                $count = mysqli_num_rows($res); // Function to get all the rows in the database

                $sn = 1; // Create a Variable and Assign the Value

                // Checking the number of rows
                if ($count > 0) {
                    // We have data in the Database
                    while ($rows = mysqli_fetch_assoc($res)) {

                        // Using while loop to get all the data from the database.
                        // and while loop will run as long as we have the data in the database.

                        // Get the individual data
                        $vehiclemodel = $rows['model'];
                        $vehiclenumber = $rows['number'];
                        $seatingcapacity = $rows['seatingcapacity'];
                        $timeinterval = $rows['timeinterval'];
                        $id = $rows['id'];
            ?>
                        <!-- Displaying the Values in the Table -->
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $vehiclemodel; ?></td>
                            <td><?php echo $vehiclenumber; ?></td>
                            <td><?php echo $seatingcapacity; ?></td>
                            <td><?php echo $timeinterval; ?></td>
                            
                        </tr>

            <?php
                    }
                } else {
                }
            }
            ?>
        </tbody>
    </table>
    </div>
</body>

</html>