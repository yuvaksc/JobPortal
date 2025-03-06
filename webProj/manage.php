<?php

include 'login/config.php';
session_start();
$user_id = $_SESSION['user_id'];


if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location: ./login/login.php');
}

$select = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0){
  $row = mysqli_fetch_assoc($select);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/headfoot.css">
    <link rel="stylesheet" href="./css/manage.css">
</head>
<body>
    <header>
        <nav class="header-navbar header-navbar-active">
            <div class="header-container">
            <a href="#" class="header-logo">
                <img id='header-main-logo' src="./assets/images/logo-dark.png" alt="Logo">
            </a>
            <ul class="header-nav-links">
                <li><a class="header-a" href="test.php">Home</a></li>
                <li><a class="header-a" href="job-search.php">Job Listings</a></li>
                <li><a class="header-a" href="post-job.php">Job Post</a></li>
                <li><a class="header-a" href="resume-detail.php">Resume</a></li>
            </ul>
            
            
            <div class="auth-buttons">
              <a class="btn-signup" data-toggle="dropdown" href="signup.html" previewlistener="true">
                <img src="./login/uploaded_img/<?php echo $row['image'] ?>" class="img-responsive img-circle" alt="">
                <p class="b"><?php echo $row['name'] ?></p>
              </a>
              <ul class="login-dropdown" style="display: none;">
              <li><a href="manage.php" previewlistener="true">Dashboard</a></li>
                <li><a href="login/update_profile.php" previewlistener="true">Update Profile</a></li>
                <li><a href="edit_profile.php" previewlistener="true">Create Resume</a></li>
                <li><a href="login/home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a></li>
              </ul>
            </div>   
            </div>
        </nav>
    </header>
    
    <div>
        <img id='top-img' src="./assets/images/top.png">
        <h1 class="top-text">Manage Applications</h1>
    </div>

    <br><br><br>
    <!-- ======================= End Page Title ===================== -->

    <?php

    if(isset($_GET['job_id'])) {
      // Retrieve job ID and user ID from URL parameters
      $jobId = $_GET['job_id'];

      $sql_job = "SELECT * FROM jobcards WHERE id = $jobId";
        $result_job = $conn->query($sql_job);
        $appliedbyId = $user_id;

        if ($result_job->num_rows > 0) {
            // Fetch job details
            $row = $result_job->fetch_assoc();
            
            // Extract job details  
            $companyName = $row['company'];
            $jobTitle = $row['title'];
            $location = $row['address'] .", ". $row['country'];
            $email = $row['email'];
            $logo = $row['logo'];
            $companyid = $row['id'];

            // Insert data into the managejobs table
            $sql_insert = "INSERT INTO managejobs (companyName, jobtitle, location, email, appliedbyId, logo, companyId) SELECT '$companyName', '$jobTitle', '$location', '$email', '$appliedbyId', '$logo', '$companyid'
            WHERE NOT EXISTS (
              SELECT 1 FROM managejobs WHERE companyId = '$companyid'
            )";

            if ($conn->query($sql_insert) === TRUE) {
                echo "";
            } else {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
            }
          }
    }

    ?>







    <section class="whole">
        <div class="cont">
          <div class="table-responsive">
            <table class="table-hover">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Location</th>
                  <th>Email</th>
                  <th>Posted</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 

                $sql_select = "SELECT * FROM managejobs WHERE appliedbyId = $user_id"; // Replace $userId with the actual ID of the logged-in user
                $result = $conn->query($sql_select);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='td1'><a href='job-detail.html'><img src='uploads/".$row['logo']."' class='avatar-lg' alt='Avatar'>".$row['jobtitle']." <span class='mng-jb'>".$row['companyname']."</span></a></td>";
                        echo "<td class='td2'><i class='ti-location-pin'><img src='./assets/images/loc1.png' style='width: 20px; transform: translate(0,20%);'></i> ".$row['location']."</td>";
                        echo "<td class='td3'><img src='./assets/images/mail-list.png' style='width: 20px; transform: translate(0,20%);'> ".$row['email']."</td>";
                        echo "<td class='td4'><i class='ti-credit-card'></i> " . $row['applied_at'] . "</td>";
                        echo "<td class='td5'><a href='mailto:".$row['email']."' class='cl-success-mrg-5'><i class='fa-edit'><img src='./assets/images/edit.png' style='width: 18px; transform: translate(0,20%);'></i></a>";
                        // <a href='#' class='cl-danger-mrg-5' onclick='deleteEntry(".$row['id'].")'><i class='fa-edit'><img src='./assets/images/delete.png' style='width: 19px; transform: translate(0,25%);'></i></a></td>";
                        
                        echo "
                        <form method='POST' action='delete_entry.php' style='display:inline;'>
                        <input type='hidden' name='id' value='".$row['id']."'>
                        <button type='submit' class='cl-danger-mrg-5' onclick='return confirm(\"Are you sure you want to delete this entry?\");' style='border: none; background-color: transparent; cursor: pointer;'>
                            <i class='fa-edit'>
                                <img src='./assets/images/delete.png' style='width: 19px; transform: translate(0,25%);'>
                            </i>
                        </button>
                        </form>
                        ";
                        
                        echo "</tr>";
                    }
                } 


              ?>

                <tr>
                  <td class="td1"><a href="job-detail.html"> <img src="./assets/images/client-1.jpg" class="avatar-lg" alt="Avatar">Software Development <span class="mng-jb">Apple Inc</span> </a></td>
                  <td class="td2"><i class="ti-location-pin"><img src="./assets/images/loc1.png" style="width: 20px; transform: translate(0,20%);"></i> 2708 Scenic Way, Sutter</td>
                  <td class="td3"><img src="./assets/images/mail-list.png" style="width: 20px; transform: translate(0,20%);"> mail@example.com</td>
                  <td class="td4"><i class="ti-credit-card"></i> 01 Jan 2021</td>
                  <td class="td5"><a href="#" class="cl-success-mrg-5"><i class="fa-edit"><img src="./assets/images/edit.png" style="width: 18px; transform: translate(0,20%);"></i></a> <a href="#" class="cl-danger-mrg-5"><i class="fa-edit"><img src="./assets/images/delete.png" style="width: 19px; transform: translate(0,25%);"></i></a></td>
                </tr>
              </tbody>
            </table>
            <div class="pages">
              <ul class="pagination">
                <li class="page-item"> <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">«</span> <span class="sr-only">Previous</span> </a> </li>
                <li class="page-item active"><a class="page-link one" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">»</span> <span class="sr-only">Next</span> </a> </li>
              </ul>
            </div>
          </div>
        </div>
      </section>








    <footer>
        <div class="subscribe">
          <div class="sub">
            <h1>Subscribe Our Newsletter!</h1>
            <p>Subscribe to get the latest job updates</p>
          </div>
          <img id = 'fimg1' src="assets/images/footback_cleanup.png">
          <div class="subscription-form">
            <img id = 'fimg3' class="fimgs" src="assets/images/mailimg.png">
            <input id='eml' type="email" placeholder="Enter your Email...">
            <button type="submit">SUBSCRIBE</button>
          </div>
        </div>
    
        <div class="foot">
          <img id = 'fimg2' class="fimgs" src="assets/images/footimg.png">
          <div class="foot-text fimgs">
            <p>© 2023 Leaders Live. All rights reserved</p>
          </div>
        </div>
      </footer> 

      <script src="log.js"></script>

</body>
</html>