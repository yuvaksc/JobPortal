<?php

include 'login/config.php';
session_start();
$user_id = $_SESSION['user_id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file

    // General Information
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $designation = $_POST["desig"];
    $category = $_POST["category"];
    $experience = $_POST["exp"];
    $jobtype = $_POST["jobtype"];
    $expectpackage = $_POST["pcg"];
    $skills = $_POST["skills"];
    $career = $_POST["career"];

    // Personal Detail & Address
    $birth = $_POST["birth"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $zipcode = $_POST["zipcode"];

    // Social Accounts
    $facebook = $_POST["facebook"];
    $google = $_POST["google"];
    $twitter = $_POST["twitter"];
    $linkedin = $_POST["linkedin"];
    $pinterest = $_POST["pinterest"];
    $insta = $_POST["insta"];

    // Insert into Employees table
    $sql = "INSERT INTO resume (userid, FirstName, LastName, Email, Phone, Designation, Category, Experience, JobType, ExpectPackage, Skills, Career, Birth, Address, City, State, Country, ZipCode, Facebook, GooglePlus, Twitter, LinkedIn, Pinterest, Instagram)
        VALUES ('$user_id', '$firstname', '$lastname', '$email', '$phone', '$designation', '$category', '$experience', '$jobtype', '$expectpackage', '$skills', '$career', '$birth', '$address', '$city', '$state', '$country', '$zipcode', '$facebook', '$google', '$twitter', '$linkedin', '$pinterest', '$insta')
        ON DUPLICATE KEY UPDATE 
        FirstName = VALUES(FirstName), 
        LastName = VALUES(LastName), 
        Email = VALUES(Email), 
        Phone = VALUES(Phone), 
        Designation = VALUES(Designation), 
        Category = VALUES(Category), 
        Experience = VALUES(Experience), 
        JobType = VALUES(JobType), 
        ExpectPackage = VALUES(ExpectPackage), 
        Skills = VALUES(Skills), 
        Career = VALUES(Career), 
        Birth = VALUES(Birth), 
        Address = VALUES(Address), 
        City = VALUES(City), 
        State = VALUES(State), 
        Country = VALUES(Country), 
        ZipCode = VALUES(ZipCode), 
        Facebook = VALUES(Facebook), 
        GooglePlus = VALUES(GooglePlus), 
        Twitter = VALUES(Twitter), 
        LinkedIn = VALUES(LinkedIn), 
        Pinterest = VALUES(Pinterest), 
        Instagram = VALUES(Instagram)";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;

       // Insert qualifications
        if (!empty($_POST['degree'])) {
            $degrees = $_POST['degree'];
            $degDescs = $_POST['deg-desc'];
            $degFroms = $_POST['deg-from'];
            $degTos = $_POST['deg-to'];

            foreach ($degrees as $key => $degree) {
                $degree = mysqli_real_escape_string($conn, $degrees[$key]);
                $degDesc = mysqli_real_escape_string($conn, $degDescs[$key]);
                $degFrom = mysqli_real_escape_string($conn, $degFroms[$key]);
                $degTo = mysqli_real_escape_string($conn, $degTos[$key]);

                $edu_sql = "INSERT INTO Education (userid, EducationID, Degree, Description, DateFrom, DateTo)
                    VALUES ('$user_id', '$last_id', '$degree', '$degDesc', '$degFrom', '$degTo')
                    ON DUPLICATE KEY UPDATE
                    Degree = VALUES(Degree),
                    Description = VALUES(Description),
                    DateFrom = VALUES(DateFrom),
                    DateTo = VALUES(DateTo)";
                
                mysqli_query($conn, $edu_sql);
            }
        }

        // Insert skills
        if (!empty($_POST['designation'])) {
            $designations = $_POST['designation'];
            $desigDescs = $_POST['desig-desc'];
            $desigFroms = $_POST['desig-from'];
            $desigTos = $_POST['desig-to'];

            foreach ($designations as $key => $designation) {
                $designation = mysqli_real_escape_string($conn, $designations[$key]);
                $desigDesc = mysqli_real_escape_string($conn, $desigDescs[$key]);
                $desigFrom = mysqli_real_escape_string($conn, $desigFroms[$key]);
                $desigTo = mysqli_real_escape_string($conn, $desigTos[$key]);

                $work_sql = "INSERT INTO workexperience (userid, ExperienceID, Designation, Description, DateFrom, DateTo)
                    VALUES ('$user_id', '$last_id', '$designation', '$desigDesc', '$desigFrom', '$desigTo')
                    ON DUPLICATE KEY UPDATE
                    Designation = VALUES(Designation),
                    Description = VALUES(Description),
                    DateFrom = VALUES(DateFrom),
                    DateTo = VALUES(DateTo)";
                        
                mysqli_query($conn, $work_sql);
            }
        }

        
        header("Location: edit_profile.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
