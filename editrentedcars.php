<?php include('includes/constants.php') ?>

<?php

// 1. Get the id from the URL
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM carsrent WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $vehiclemodel = $res['model'];
    $vehiclenumber = $res['number'];
    $seatingcapacity = $res['seatingcapacity'];
    $timeinterval = $res['timeinterval'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Booked Car User</title>
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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>Rental</span></a></h2></a>
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="availcarsrent.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="bookedcarsuser.php">Booked Cars</a>
                <a class="nav-item nav-link" href="#">Logout</a>
            </div>
        </div>
    </nav>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Cars</h4>
                <form class="forms-sample" method="POST">
                    <div class="form-group">
                        <label for="vehiclemodel">Vehicle Model</label>
                        <input type="text" class="form-control" name="vehiclemodel" value="<?php echo $vehiclemodel; ?>" id="vehiclemodel" readonly placeholder="Vehicle Model">
                    </div>
                    <div class="form-group">
                        <label for="vehiclenumber">Vehicle Number</label>
                        <input type="text" class="form-control" name="vehiclenumber" id="vehiclenumber" value="<?php echo $vehiclenumber; ?>" readonly placeholder="Vehicle Number">
                    </div>
                    <div class="form-group">
                        <label for="seatingcapacity">Seating Capacity</label>
                        <input type="text" class="form-control" name="seatingcapacity" id="seatingcapacity" value="<?php echo $seatingcapacity; ?>" readonly placeholder="Seating Capacity">
                    </div>
                    <div class="form-group">
                        <label for="timeinterval">Time Interval</label>
                        <input type="text" class="form-control" id="timeinterval" name="timeinterval" value="<?php echo $timeinterval; ?>" placeholder="Rent Per Day">
                    </div>

                    <input type="hidden" name="id" value=<?php echo $id; ?>>
                    <button type="submit" name="update" class="btn btn-gradient-secondary me-2">Update</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    // Process the Value from Form and Save it in the Database

    // Check whether the submit button is clicked or not.

    if (isset($_POST['update'])) {

        // 1. Get the Data from the Form

        
        $timeinterval1 = $_POST['timeinterval'];

        // 2. SQL Query to Save the data into the Database

         
        $sql = "UPDATE carsrent SET
                        timeinterval='$timeinterval1'
                    WHERE id='$id'
            ";

        // 3. Executing the Query and Saving data into the Database
        $res = mysqli_query($conn, $sql);

        // 4. Check whether the Query is executed or not and Data is inserted or not and displaying the appropriate message
        if ($res == TRUE) {
            // Data Inserted Successfully

            // Create a Session Variable to Display Message
            $_SESSION['update'] = "<div class='success'>Cars Updated Successfully</div>";

            // Redirect Page to Booked Cars User Page
            header("location:" . SITEURL . "bookedcarsuser.php");
        } else {
            // Failed to Insert Data | Show Error Message

            // Create a Session Variable to Display Message
            $_SESSION['update'] = "<div class='error'>Failed to Update Car</div>";

            // Redirect Page to Booked Cars User Page
            header("location:" . SITEURL . "bookedcarsuser.php");
        }
    }

    ?>
</body>

</html>