<?php

    // Importing Modules
    include('includes/constants.php');

    // 1. Get the ID of Car to be deleted
    $id = $_GET['id'];

    // 2. Create SQL Query to delete the Car
    $sql = "DELETE FROM cars WHERE id=$id";

    // Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully.
    if($res==true)
    {
        // Query Executed Successfully.
        

        // Create Session Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Car Deleted Successfully.</div>";
        // Redirect to Manage Admin Page
        header('location:'.SITEURL.'managecars.php');
    }
    else {
        // Failed to Delete Car.
        

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Car. Try Again Later.</div>";
        // Redirect to Manage Admin Page
        header('location:'.SITEURL.'managecars.php');
    }
    
?>