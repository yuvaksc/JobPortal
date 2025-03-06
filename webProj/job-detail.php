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
    <title>Resume Detail</title>
    <link rel="stylesheet" href="./css/headfoot.css">
    <link rel="stylesheet" href="./css/job-detail.css">
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
        <h1 class="top-text">Job Details</h1>
    </div>

    <br><br><br><br><br><br><br>
    <!-- ======================= End Page Title ===================== --> 


    <?php

    
    if(isset($_GET['jobId'])) {
        $jobId = $_GET['jobId'];
    
        // Step 3: Execute a query to retrieve data for the specific job
        $sql_job = "SELECT * FROM jobcards WHERE id = $jobId";
        $result_job = $conn->query($sql_job);
    
        if ($result_job->num_rows > 0) {
            $row = $result_job->fetch_assoc();
        } else {
            // Handle case where no job record is found
            echo "No job found with ID: " . $jobId;
        }
    } else {
        // Handle case where jobId parameter is not set
        echo "Job ID parameter is missing";
    }

    ?>
    
    
    <div class="div1">
      <div class="div2">
          <div class="div3">
              <div class="div4">
                  <div class="relative">
                      <img src="assets/images/job-detail.jpg" alt="" class="img1">
                      <div class="abs">
                          <img src="uploads/<?php echo $row['logo']; ?>" alt="" class="img2">
                      </div>
                  </div>
                  <div class="p-6">
                      <div class="nodiv5">
                          <div class="div6">
                              <div class="relative">
                                  <h5 class="h5 f f2"><?php echo $row['title']; ?></h5>
                                  <ul class="ul1">
                                      <li class="f1">
                                          <i class="mdi-account"></i> <?php echo $row['vacancy']; ?> Vacancy
                                      </li>
                                      <li class="notext-yellow-500">
                                          <span class="rating">4.8</span> 
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>

                      <div class="boxes">
                          <div class="box">
                              <div class="box-div">
                                  <p class="p1 f1">Experience</p>
                                  <p class="p2 f">Minimum <?php echo $row['experience']; ?></p>
                              </div>
                          </div>
                          <div class="box">
                              <div class="box-div">
                                  <p class="p1 f1">Employee type</p>
                                  <p class="p2 f"><?php echo $row['job_type']; ?></p>
                              </div>
                          </div>
                          <div class="box">
                              <div class="box-div">
                                  <p class="p1 f1">Position</p>
                                  <p class="p2 f">Senior</p>
                              </div>    
                          </div>
                          <div class="box">
                              <div class="box-div">
                                  <p class="p1 f1">Offer Salary</p>
                                  <p class="p2 f">$<?php echo $row['salary_range']; ?></p>
                              </div>
                          </div>
                      </div>

                      <div class="mt-5">
                          <h5 class="f f2">Job Description</h5>
                          <div>
                              <p class="f1 jd"><?php echo $row['description']; ?></p>
                          </div>
                      </div>

                      <div class="mt-5">
                          <h class="f f2"><b>Responsibilities</b></h5>
                          <div>
                              <p class="f1 f3">As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent.</p>


                              <?php
                                // Retrieve responsibilities from the database
                                $responsibilities = $row['responsibilities'];

                                // Split the responsibilities paragraph into individual points based on periods
                                $responsibilityPoints = explode('.', $responsibilities);

                                // Display the responsibilities within the list
                                echo '<ul class="f1 f3">';
                                foreach ($responsibilityPoints as $point) {
                                    // Trim the point to remove any leading or trailing whitespace
                                    $point = trim($point);
                                    // If the point is not empty, display it within a list item
                                    if (!empty($point)) {
                                        echo '<li><i class="circ"></i>' . $point . '</li>';
                                    }
                                }
                                echo '</ul>';
                                ?>
                          </div>
                      </div>

                      <div class="mt-5">
                          <h5 class="f f2">Qualification</h5>
                          <div>
                          <?php
                            // Retrieve responsibilities from the database
                            $qualification = $row['qualifications'];

                            // Split the responsibilities paragraph into individual points based on periods
                            $qualificationPoints = explode('.', $qualification);

                            // Display the responsibilities within the list
                            echo '<ul class="f1 f3">';
                            foreach ($qualificationPoints as $point) {
                                // Trim the point to remove any leading or trailing whitespace
                                $point = trim($point);
                                // If the point is not empty, display it within a list item
                                if (!empty($point)) {
                                    echo '<li><i class="circ"></i>' . $point . '</li>';
                                }
                            }
                            echo '</ul>';
                            ?>

                          </div>
                      </div>
                      <br>
                      <div class="mt-50">
                      <?php
                        // Retrieve responsibilities from the database
                        $skills = $row['skills'];

                        // Split the responsibilities paragraph into individual points based on periods
                        $skillsPoints = explode(',', $skills);

                        // Display the responsibilities within the list
                        echo '<ul class="f1 f3">';
                        foreach ($skillsPoints as $point) {
                            // Trim the point to remove any leading or trailing whitespace
                            $point = trim($point);
                            // If the point is not empty, display it within a list item
                            if (!empty($point)) {
                                echo '<span style="margin:5px;"><b>' . $point . '</b></span>';
                            }
                        }
                        ?>
                      </div>

                  </div>

              </div>
              
          </div>
          <div class="right">
              <div class="right-div1">
                  <div class="p-6">
                      <h6 class="h61 f">Job Overview</h6>

                      <ul class="right-div1-ul">
                          <li>
                              <div class="mt-6">
                                  <i ></i>
                                  <div>
                                      <h6 class="f">Job Title</h6>
                                      <p class="f1"><?php echo $row['title']; ?></p>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="mt-6">
                                  <i></i>
                                  <div>
                                      <h6 class="f">Experience</h6>
                                      <p class="f1"><?php echo $row['experience']; ?></p>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="mt-6">
                                  <i></i>
                                  <div>
                                      <h6 class="f">Location</h6>
                                      <p class="f1"><?php echo $row['country']; ?></p>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="mt-6">
                                  <i></i>
                                  <div>
                                      <h6 class="f">Offered Salary</h6>
                                      <p class="f1">$<?php echo $row['salary_range']; ?></p>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="mt-6">
                                  <i></i>
                                  <div>
                                      <h6 class="f">Qualification</h6>
                                      <p class="f1"><?php echo $row['degree']; ?></p>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="mt-6">
                                  <i></i>
                                  <div>
                                      <h6 class="f">Industry</h6>
                                      <p class="f1">Private</p>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="mt-6">
                                  <i></i>
                                  <div>
                                      <h6 class="f">Date Posted</h6>
                                      <p class="f1">Posted 2 hrs ago</p>
                                  </div>
                              </div>
                          </li>
                      </ul>

                      <div class="apply-btn">
                          <a href="manage.php?job_id=<?php echo $row['id']; ?>">Apply Now <i class="uil uil-arrow-right"></i></a>

                      </div>
                  </div>
              </div>
              <div class="right-div2">
                  <div class="p-6">
                      <div class="p-62">
                          <img src="assets/images/img-02.png" alt="" class="mx-auto img-fluid">

                          <div class="mt-41">
                              <h6 class="mt-41-h6">Jobcy Technology Pvt.Ltd</h6>
                              <p class="mt-41-p">Since July 2017</p>
                          </div>

                          <ul class="mt-42">
                              <li>
                                  <div class="flex">
                                      <i class="uil-phone-volume group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500"></i>
                                      <div>
                                          <h6 class="f">Phone</h6>
                                          <p class="f1">+589 560 56555</p>
                                      </div>
                                  </div>
                              </li>
                              <li class="mt-3">
                                  <div class="flex">
                                      <i class="text-xl uil uil-envelope group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500"></i>
                                      <div>
                                          <h6 class="f">Email</h6>
                                          <p class="f1">pixltechnology@info.com</p>
                                      </div>
                                  </div>
                              </li>
                              <li class="mt-3">
                                  <div class="flex">
                                      <i class="text-xl uil uil-globe group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500"></i>
                                      <div>
                                          <h6 class="f">Website</h6>
                                          <p class="f1">www.Jobcytechnology.pvt.ltd.com</p>
                                      </div>
                                  </div>
                              </li>
                              <li class="mt-3">
                                  <div class="flex">
                                      <i class="text-xl uil uil-map-marker group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500"></i>
                                      <div>
                                          <h6 class="f">Location</h6>
                                          <p class="f1">Oakridge Lane Richardson.</p>
                                      </div>
                                  </div>
                              </li>
                          </ul>

                      </div>
                  </div>
              </div>
              <div class="mt-43">
                  <h6>Job location</h6>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1628067715234!5m2!1sen!2sin"
                      style="width:100%" height="250" allowfullscreen="" loading="lazy"></iframe>
              </div>
          </div>
      </div>
  </div>


  <br><br><br><br>


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