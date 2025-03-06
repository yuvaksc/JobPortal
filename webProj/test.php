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
  <title>Job Portal</title>
  <link rel="stylesheet" href="./css/test.css">
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">"
</head>
<body>
  <header>
    <nav class="navbar"> 
      <div class="container">
        <a href="#" class="logo">
          <img id='main-logo' src="assets/images/logo.png" alt="Logo">
        </a>
        <ul class="nav-links">
          <li><a class="a" href="test.php">Home</a></li>
          <li><a class="a" href="job-search.php">Job Listings</a></li>
          <li><a class="a" href="post-job.php">Post Job</a></li>
          <li><a class="a" href="resume-detail.php">Resume</a></li>
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
      </div>
    </nav>
  </header>


 <div class="home-search">
  <div class="text">
    <h2>Search Between More Than <span class="t1">50,000</span> Open Jobs.</h2>
    <p>Trending Jobs Keywords: <span class="trending_key">
      <a href="#"><b>Web Designer</b></a></span> 
      <span class="trending_key">
        <a href="#"><b>Web Developer</b></a>
      </span> 
      <span class="trending_key">
        <a href="#"><b>IOS Developer</b></a>
      </span> 
      <span class="trending_key">
        <a href="#"><b>Android Developer</b></a>
      </span>
    </p> 
  </div>
  
  <form action="job-search.php" method="POST">
    <fieldset class="form">
      <div class="search">
        <input type="text" class="search-bar" placeholder="Search Company..." name="company">
      </div>
      <div class="loc">
          <select name="loc">
            <option hidden>Location</option>
            <option value="America">America</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="Brazil">Brazil</option>
            <option value="Burundi">Burundi</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Germany">Germany</option>
            <option value="Grenada">Grenada</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Iceland">Iceland</option>
          </select>
      </div>

      <div class="loc">
        <select style="display: block;" name="cat">
          <option hidden>Category</option>
          <option value="Software Developer1">Software Developer</option>
          <option value="Java Developer">Java Developer</option>
          <option value="Software Engineer">Software Engineer</option>
          <option value="Web Developer">Web Developer</option>
          <option value="PHP Developer">PHP Developer</option>
          <option value="Python Developer">Python Developer</option>
          <option value="Front end Developer">Front end Developer</option>
          <option value="Associate Developer">Associate Developer</option>
          <option value="Back end Developer">Back end Developer</option>
          <option value="Hardware">Hardware</option>
          <option value=".NET Developer">.NET Developer</option>              
          <option value="Marketing">Marketing</option>
        </select>
      </div>

      <div class="search-submit">
        <button type="submit">Search</button>
      </div>
    </fieldset>
  </form>
 </div>

 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  <ul class="rec-head" role="tablist">
    <li class="rec-head1"> <a class="rec-head3"> Latest Jobs</a> </li>
  </ul>


  <div class="row">
  
  
  <?php
  // Assuming you have a database connection established
  // Fetch data from the database
  $query = "SELECT * FROM jobcards";
  $res = mysqli_query($conn, $query);

  if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_assoc($res)) {
          $jobTitle = $row['title'];
          $jobLocation = $row['address'].", ".$row['state'].", ".$row['country'];
          $companyLogo = $row['logo'];
          $jobtype = $row['job_type'];

          // Output the HTML structure with dynamic data
          echo '<div class="card">
                  <div class="grid-area">
                      <span class="job-full">'.$jobtype.'</span>
                      <div class="job_like">
                          <label class="toggler">
                              <input type="checkbox" checked="">
                              <i class="heart"></i> 
                          </label>
                      </div>
                      <div class="u-content">
                          <div class="box"> <a href="employer-detail.html"> <img class="img-responsive" src="uploads/' . $companyLogo . '" alt=""> </a> </div>
                          <h5><b>' . $jobTitle . '</b></h5>
                          <p class="text-muted">' . $jobLocation . '</p>
                      </div>
                      <div class="aply-btn"> <a href="job-detail.html" class="btn">Apply Now</a> </div>
                  </div>
              </div>';
      }
  } else {
      echo "No jobs found";
  }
  ?>


  <div class="card">
    <div class="grid-area"> <span class="job-full">Full Time</span>
      <div class="job_like">
        <label class="toggler">
          <input type="checkbox" checked="">
          <i class="heart"></i> 
        </label>
      </div>
      <div class="u-content">
        <div class="box"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/images/company_logo_1.png" alt=""> </a> </div>
        <h5><b>Product Redesign</b></h5>
        <p class="text-muted">2708 Scenic Way, IL 62373</p>
      </div>
      <div class="aply-btn"> <a href="job-detail.html" class="btn">Apply Now</a> </div>
    </div>
  </div>


  <div class="card">
    <div class="grid-area"> <span class="job-full">Full Time</span>
      <div class="job_like">
        <label class="toggler">
          <input type="checkbox" checked="">
          <i class="heart"></i> 
        </label>
      </div>
      <div class="u-content">
        <div class="box"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/images/company_logo_1.png" alt=""> </a> </div>
        <h5><b>Product Redesign</b></h5>
        <p class="text-muted">2708 Scenic Way, IL 62373</p>
      </div>
      <div class="aply-btn"> <a href="job-detail.html" class="btn">Apply Now</a> </div>
    </div>
  </div>


  <div class="card">
    <div class="grid-area"> <span class="job-full">Full Time</span>
      <div class="job_like">
        <label class="toggler">
          <input type="checkbox" checked="">
          <i class="heart"></i> 
        </label>
      </div>
      <div class="u-content">
        <div class="box"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/images/company_logo_1.png" alt=""> </a> </div>
        <h5><b>Product Redesign</b></h5>
        <p class="text-muted">2708 Scenic Way, IL 62373</p>
      </div>
      <div class="aply-btn"> <a href="job-detail.html" class="btn">Apply Now</a> </div>
    </div>
  </div>


  <div class="card">
    <div class="grid-area"> <span class="job-full">Full Time</span>
      <div class="job_like">
        <label class="toggler">
          <input type="checkbox" checked="">
          <i class="heart"></i> 
        </label>
      </div>
      <div class="u-content">
        <div class="box"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/images/company_logo_1.png" alt=""> </a> </div>
        <h5><b>Product Redesign</b></h5>
        <p class="text-muted">2708 Scenic Way, IL 62373</p>
      </div>
      <div class="aply-btn"> <a href="job-detail.html" class="btn">Apply Now</a> </div>
    </div>
  </div>


  <div class="card">
    <div class="grid-area"> <span class="job-full">Full Time</span>
      <div class="job_like">
        <label class="toggler">
          <input type="checkbox" checked="">
          <i class="heart"></i> 
        </label>
      </div>
      <div class="u-content">
        <div class="box"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/images/company_logo_1.png" alt=""> </a> </div>
        <h5><b>Product Redesign</b></h5>
        <p class="text-muted">2708 Scenic Way, IL 62373</p>
      </div>
      <div class="aply-btn"> <a href="job-detail.html" class="btn">Apply Now</a> </div>
    </div>
  </div>


  <div class="card">
    <div class="grid-area"> <span class="job-full">Full Time</span>
      <div class="job_like">
        <label class="toggler">
          <input type="checkbox" checked="">
          <i class="heart"></i> 
        </label>
      </div>
      <div class="u-content">
        <div class="box"> <a href="employer-detail.html"> <img class="img-responsive" src="assets/images/company_logo_1.png" alt=""> </a> </div>
        <h5><b>Product Redesign</b></h5>
        <p class="text-muted">2708 Scenic Way, IL 62373</p>
      </div>
      <div class="aply-btn"> <a href="job-detail.html" class="btn">Apply Now</a> </div>
    </div>
  </div>

  </div>


  <div class="cont-work">
  <div class="how-it-works">
    <h2>How It Work</h2>
    <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
    <div class="step">
      <span class="step-number">1</span>
      <span class="step-title">Register an account</span>
      <p class="step-description">Due to its widespread use as filler text for layouts, non-readability is of great importance.</p>
    </div>
    <div class="step">
      <span class="step-number">2</span>
      <span class="step-title">Find your job</span>
      <p class="step-description">There are many variations of passages of available mark-label, but the majority alteration in some form.</p>
    </div>
    <div class="step">
      <span class="step-number">3</span>
      <span class="step-title">Apply for job</span>
      <p class="step-description">It is a long established fact that a reader will be distracted by readable content of page.</p>
    </div>
  </div>
  <div class="illustration">
    <img src="./assets/images/how-work.png">
  </div>
  </div>




  <footer>
    <div class="subscribe">
      <div class="sub">
        <h1>Subscribe Our Newsletter!</h1>
        <p>Subscribe to get the latest job updates</p>
      </div>
      <img id = 'fimg1' src="assets/images/footback_cleanup.png">
      <form action="sub.php" method="POST">
      <div class="subscription-form">
        <img id = 'fimg3' class="fimgs" src="assets/images/mailimg.png">
        <input id='eml' name="email" type="email" placeholder="Enter your Email...">
        <button type="submit">SUBSCRIBE</button>
      </div>
      </form>
    </div>

    <div class="foot">
      <img id = 'fimg2' class="fimgs" src="assets/images/footimg.png">
      <div class="foot-text fimgs">
        <p>© 2023 Leaders Live. All rights reserved</p>
      </div>
    </div>
  </footer>  


  <script src="test.js"></script>
  <script src="log.js"></script>
</body>
</html>
