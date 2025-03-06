<?php
// Include your database connection file
include 'login/config.php';
session_start();
$user_id = $_SESSION['user_id'];

// Check if entry_id is provided
if (isset($_POST['id'])) {
    // Sanitize the input to prevent SQL injection
    $entry_id = mysqli_real_escape_string($conn, $_POST['id']);

    // SQL query to delete the entry with the given entry_id
    $sql = "DELETE FROM managejobs WHERE id = '$entry_id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Deletion successful
        header("Location: manage.php");
    } else {
        // Deletion failed
        echo "Error deleting entry: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // Redirect back to the page or handle the case where entry_id is not provided
    header("Location: manage.php");
    exit();
}
?>
