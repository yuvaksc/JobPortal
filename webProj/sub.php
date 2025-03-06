<?php

include 'login/config.php';
session_start();
$user_id = $_SESSION['user_id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the email address from the form
    $email = $_POST['email'];

    $sql = "INSERT INTO news (user_id, email)
            VALUES ('$user_id', '$email')";

    mysqli_query($conn, $sql);
    header("Location: test.php");

}

?>