<?php
// include config file
include 'config.php';

// start session
session_start();

// check if form is submitted
if(isset($_POST['username']) && isset($_POST['password'])){
    // retrieve input data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // query to insert data into database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    // execute query
    if(mysqli_query($conn, $query)){
        // set session variable
        $_SESSION['username'] = $username;

        // redirect to success page
        header('Location: success.php');
    }else{
        // display error message
        echo "Error: " . mysqli_error($conn);
    }
}
?>
