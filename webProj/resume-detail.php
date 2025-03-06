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
  $row1 = mysqli_fetch_assoc($select);
}

$sel = mysqli_query($conn, "SELECT * FROM resume WHERE userid = '$user_id'") or die('query failed');
if(mysqli_num_rows($sel) > 0){
  $res = mysqli_fetch_assoc($sel);
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Detail</title>
    <link rel="stylesheet" href="./css/headfoot.css">
    <link rel="stylesheet" href="./css/resume-detail.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
                <img src="./login/uploaded_img/<?php echo $row1['image'] ?>" class="img-responsive img-circle" alt="">
                <p class="b"><?php echo $row1['name'] ?></p>
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
        <h1 class="top-text">Resume Details</h1>
    </div>
    <br><br><br><br><br><br><br>
    <!-- ======================= End Page Title ===================== --> 
    
    <!-- ====================== Resume Detail ================ -->
    <div class="left-matter">
            <div class="row">
                <div class="box-img"> <img src="login/uploaded_img/<?php echo $row1['image'] ?>" class="img-circle" alt="">
                <h4 class="meg-0">Alden Smith</h4><br>
                <span>Front End Designer</span> 
                </div>
                <div class="user_job_detail">  
                  <div class="mrg"> <i class="ti-loc"></i><?php echo $res['Address'] ?>, <?php echo $res['Country'] ?> </div>
                  <div class="mrg"> <i class="ti-email"></i><?php echo $res['Email'] ?></div>
                  <div class="mrg"> <i class="ti-mobile"></i><?php echo $res['Phone'] ?> </div>
                  <div class="mrg"> <i class="ti-cred"></i><?php echo $res['ExpectPackage'] ?></div>
                  <div class="mrg"> <i class="ti-shield"></i><?php echo $res['Experience'] ?> Year Exp. </div>
                  <div class="mrg"> 
                    <?php 
                        $skills = $res['Skills'];
                        $skillsPoints = explode(',', $skills);
                        foreach ($skillsPoints as $point) {
                            $point = trim($point);
                            if (!empty($point)) {
                                echo '<span class="skill-tag">' . $point . '</span>';
                            }
                        }
                      ?>
                  </div>
                </div>
            </div>
      
    <!-- ====================== End Resume Detail ================ --> 

    <div class="row">
        <div class="detail-wrapper-header">
          <h4>Career</h4>
        </div>
        <div class="detail-wrapper-body">
          <!-- <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.</p>
          <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
          -->

          <?php echo '<p>' . $res['Career'] . '</p>'?>

          </div>
    </div>

    <!-- ====================== End Resume Detail ================ --> 

    <div class="row">
        <div class="detail-wrapper-header">
          <h4>Education</h4>
        </div>
        <div class="detail-wrapper-body">
          <?php 

            $sel2 = mysqli_query($conn, "SELECT * FROM education WHERE userid = '$user_id'") or die('query failed');
            if(mysqli_num_rows($sel2) > 0){
              while ($row = mysqli_fetch_assoc($sel2)) {
                // Extract education details
                $degreeName = $row['Degree'];
                $desc = $row['Description'];
                $dateFrom = $row['DateFrom'];
                $dateTo = $row['DateTo'];

                // Generate HTML for each education entry
                echo '<div class="edu-history-info"> <i></i>
                    <div class="detail-info">
                      <h3>' . $degreeName . '</h3>
                      <i>' . $dateFrom . ' - ' . $dateTo . '</i>
                      <p>' . $desc . '</p>
                    </div>
                  </div>';
              }
            }

            ?>
            
          
          <!-- <div class="edu-history-success"> <i></i>
            <div class="detail-info">
              <h3>High School</h3>
              <i>2012 - 2015</i> <span>denouncing pleasure and praising pain</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
            </div>
          </div> -->
        </div>
      </div>
    
    <!-- ====================== End Resume Detail ================ --> 

    <div class="row">
      <div class="detail-wrapper-header">
        <h4>Work &amp; Experience</h4>
      </div>
      <div class="detail-wrapper-body">

      <?php 

        $sel3 = mysqli_query($conn, "SELECT * FROM workexperience WHERE userid = '$user_id'") or die('query failed');
        if(mysqli_num_rows($sel3) > 0){
          while ($row = mysqli_fetch_assoc($sel3)) {
            // Extract education details
            $desig = $row['Designation'];
            $desc = $row['Description'];
            $dateFrom = $row['DateFrom'];
            $dateTo = $row['DateTo'];
    
            // Generate HTML for each education entry
            echo '<div class="edu-history-info"> <i></i>
                <div class="detail-info">
                  <h3>' . $desig . '</h3>
                  <i>' . $dateFrom . ' - ' . $dateTo . '</i>
                  <p>' . $desc . '</p>
                </div>
              </div>';
          }
        }

        ?>
        


        
        <!-- <div class="edu-history-success"> <i></i>
          <div class="detail-info">
            <h3>CMS Developer</h3>
            <i>2014 - 2018</i>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
          </div>
        </div> -->
      </div>
    </div>
  </div>
    <!--Side-->

    <div class="right-matter">
      <div> 
        <!-- <div class="widget-boxed"> 	
          <div class="text-center">
            <button type="submit" class="down-btn" style="cursor: pointer;">Download Resume</button>
          </div>
        </div> -->


        <div class="widget-boxed">
          <div class="widget-boxed-header">
            <h4><i class="ti-location"></i>Location</h4>
          </div>
          <div class="widget-boxed-body">
            <div class="side-list">
              <ul>
                <li><i class='bx bx-credit-card' ></i>   <?php echo $res['ExpectPackage'] ?></li>
                <li><i class='bx bxl-linkedin-square' ></i>   <?php echo $res['LinkedIn'] ?></li>
                <li><i class='bx bxs-phone' ></i>   <?php echo $res['Phone'] ?></li>
                <li><i class='bx bx-mail-send'></i>   <?php echo $res['Email'] ?></li>
                <li><i class='bx bx-medal' ></i>   </i>Bachelor Degree</li>
                <li><i class='bx bxs-time' ></i>   3 Year Exp.</li>
              </ul>                
            </div>
          </div>
        </div>
        <!-- End: Job Overview --> 
        
        <!-- Start: Opening hour -->
        
        <!-- End: Opening hour -->           
      </div>
    </div>


    
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