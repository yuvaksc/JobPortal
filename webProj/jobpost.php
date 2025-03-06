<?php
include 'login/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Step 2: Retrieve data from the form
    $title = $_POST['title'];
    $company = $_POST['company'];
    $category = $_POST['category'];
    $desc = $_POST['desc'];
    $salary = $_POST['salary'];
    $vacancy = $_POST['vacancy'];
    $exp = $_POST['exp'];
    $degree = $_POST['degree'];
    $jobtype = $_POST['jobtype'];
    $responsibilities = $_POST['responsibilities'];
    $qualifications = $_POST['qualifications'];
    $skills = $_POST['skills'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $weblink = $_POST['weblink'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $zipcode = $_POST['zipcode'];
    $logo = ""; // Initialize logo file path
    
    if ($_FILES["logo"]["name"]) {
        // Specify directory where uploaded files will be saved
        $targetDirectory = "uploads/";
        // Build the file path
        $logo = $targetDirectory . basename($_FILES["logo"]["name"]);
        // Move the uploaded file to the specified directory
        move_uploaded_file($_FILES["logo"]["tmp_name"], $logo);
    }

    // Step 3: Insert data into the database
    $sql = "INSERT INTO jobcards (title, company, category, description, salary_range, vacancy, experience, degree, job_type, responsibilities, qualifications, skills, email, phone_number, website_link, address, city, state, country, zipcode, logo, postedbyId)
    VALUES ('$title', '$company', '$category', '$desc', '$salary', '$vacancy', '$exp', '$degree', '$jobtype', '$responsibilities', '$qualifications', '$skills', '$email', '$phone', '$weblink', '$address', '$city', '$state', '$country', '$zipcode', '$logo', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: job-search.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
