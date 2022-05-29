<?php include('includes/constants.php') ?>

<?php

// 1. Get the id from the URL
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM cars WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $vehiclemodel = $res['model'];
    $vehiclenumber = $res['number'];
    $seatingcapacity = $res['seatingcapacity'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rent Car</title>
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="managecars.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="addcars.php">Booked Cars</a>
                <a class="nav-item nav-link" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    
    <?php 
        if(isset($_SESSION['add']))  // Checking whether the Session is Set or not
        {
            echo $_SESSION['add'];  // Display the Session Message if SET
            unset($_SESSION['add']); // Remove Session Message
        }
    ?>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Rent Cars</h4>
                <form class="forms-sample" method="POST">
                    <div class="form-group">
                        <label for="vehiclemodel">Vehicle Model</label>
                        <input type="text" class="form-control" name="vehiclemodel" value="<?php echo $vehiclemodel; ?>" readonly id="vehiclemodel" placeholder="Vehicle Model">
                    </div>
                    <div class="form-group">
                        <label for="vehiclenumber">Vehicle Number</label>
                        <input type="text" class="form-control" name="vehiclenumber" value="<?php echo $vehiclenumber; ?>" readonly id="vehiclenumber" placeholder="Vehicle Number">
                    </div>
                    <div class="form-group">
                        <label for="seatingcapacity">Seating Capacity</label>
                        <input type="text" class="form-control" name="seatingcapacity" value="<?php echo $seatingcapacity; ?>" readonly id="seatingcapacity" placeholder="Seating Capacity">
                    </div>
                    <div class="form-group">
                        <label for="timeinterval">Time Interval</label>
                        <input type="text" class="form-control" id="timeinterval" name="timeinterval" placeholder="Time Interval in Days">
                    </div>
                    

                    <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Rent Car</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        // Process the Value from Form and Save it in the Database

        // Check whether the submit button is clicked or not.

        if (isset($_POST['submit'])) {
            
            // 1. Get the Data from the Form

            $vehiclemodel = $_POST['vehiclemodel'];
            $vehiclenumber = $_POST['vehiclenumber'];
            $seatingcapacity = $_POST['seatingcapacity'];
            $timeinterval = $_POST['timeinterval'];

            // 2. SQL Query to Save the data into the Database

            $sql = "INSERT INTO carsrent SET
                        id='',
                        model='$vehiclemodel',
                        number='$vehiclenumber',
                        seatingcapacity='$seatingcapacity',
                        timeinterval='$timeinterval'
            ";

            // 3. Executing the Query and Saving data into the Database
            $res = mysqli_query($conn,$sql) or die(mysqli_error());

            // 4. Check whether the Query is executed or not and Data is inserted or not and displaying the appropriate message
            if ($res==TRUE) {
                // Data Inserted Successfully

                // Create a Session Variable to Display Message
                $_SESSION['add'] = "Car Rented Successfully";
                
                // Redirect Page to Available Cars Rent Page
                header("location:".SITEURL."availcarsrent.php");
            }
            else {
                // Failed to Insert Data | Show Error Message

                // Create a Session Variable to Display Message
                $_SESSION['add'] = "Failed to Add Car";
                
                // Redirect Page to Rent Car Page
                header("location:".SITEURL."rentcar.php");

            }

        }

    ?>

</body>
</html>