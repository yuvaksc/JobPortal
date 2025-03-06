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
    <link rel="stylesheet" href="./css/job-search.css">

    <style>

    .search-submit button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
        transform: translate(130px, 0);
      
    }

    .search-submit button:hover {
        background-color: #45a049;
    }


    </style>
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
        <h1 class="top-text">Browse Jobs</h1>
    </div>
    <br><br><br><br><br><br><br>

    <div class="total">

    <form action='job-search.php' method='GET'>
      <div class="search-submit">
          <button type="submit">Search</button>
      </div>

      <div class="left">
        <div class="search-container"> 
            <input type="text" class="search-input" placeholder="Search Skills" name="search_skills">
            <input type="text" class="location-input" placeholder="Location" name="search_location">
        </div>


        <div class="salary-box">
            <h3 class="salary-title">Job Type</h3><hr class="hr-line">
            <div class="salary-range">
              <input type="checkbox" id="salary-range-1" name="job_type[]" value="Full Time">
              <label for="salary-range-1">Full Time</label>
              <span class="job-count" style="margin-left: 80px;">55</span>
            </div><hr class="hr-line">  
            <div class="salary-range">
              <input type="checkbox" id="salary-range-2" name="job_type[]" value="Part Time">
              <label for="salary-range-2">Part Time</label>
              <span class="job-count">20</span>
            </div><hr class="hr-line">
            <div class="salary-range">
                <input type="checkbox" id="salary-range-3" name="job_type[]" value="Internship">
                <label for="salary-range-3">Internship</label>
                <span class="job-count">99</span>
              </div><hr class="hr-line">
              <div class="salary-range">
                <input type="checkbox" id="salary-range-3" name="job_type[]" value="Freelancer">
                <label for="salary-range-3">Freelancer</label>
                <span class="job-count">150</span>
              </div><hr class="hr-line">
        </div><br>

        <div class="salary-box">
            <h3 class="salary-title">Experience <span class="plus plus1">+</span></h3>
            <div class="blk1">
                <hr class="hr-line">
                <div class="salary-range">
                <input type="checkbox" id="salary-range-1" name="exp_type[]" value="0 To 6 months">
                <label for="salary-range-1">0 To 6 months</label>
                <span class="salary-count" style="margin-left: 80px;">55</span>
                </div><hr class="hr-line">
                <div class="salary-range">
                <input type="checkbox" id="salary-range-2" name="exp_type[]" value="1-2 Years">
                <label for="salary-range-2">1-2 Years</label>
                <span class="salary-count">20</span>
                </div><hr class="hr-line">
                <div class="salary-range">
                    <input type="checkbox" id="salary-range-3" name="exp_type[]" value="2-3 Years">
                    <label for="salary-range-3">2-3 Years</label>
                    <span class="salary-count">99</span>
                </div><hr class="hr-line">
                <div class="salary-range">
                    <input type="checkbox" id="salary-range-3" name="exp_type[]" value="3-4 Years">
                    <label for="salary-range-3">3-4 Years</label>
                    <span class="salary-count">150</span>
                </div><hr class="hr-line">
                <div class="salary-range">
                <input type="checkbox" id="salary-range-3" name="exp_type[]" value=">4 Years">
                <label for="salary-range-3">> 4 Years</label>
                <span class="salary-count">234</span>
                </div>
            </div>
        </div><br>

       

        <div class="salary-box">
            <h3 class="salary-title">Qualification <span class="plus plus2">+</span> </h3>
            <div class="blk2">
                <hr class="hr-line">
                <div class="salary-range">
                <input type="checkbox" id="salary-range-1" name="qtype[]" value="High School">
                <label for="salary-range-1">High School</label>
                <span class="salary-count" style="margin-left: 80px;">55</span>
                </div><hr class="hr-line">
                <div class="salary-range">
                <input type="checkbox" id="salary-range-2" name="qtype[]" value="Undergraduate">
                <label for="salary-range-2">Undergraduate</label>
                <span class="salary-count">20</span>
                </div><hr class="hr-line">
                <div class="salary-range">
                    <input type="checkbox" id="salary-range-3" name="qtype[]" value="Post Graduate">
                    <label for="salary-range-3">Post Graduate</label>
                    <span class="salary-count">99</span>
                </div><hr class="hr-line">
                <div class="salary-range">
                    <input type="checkbox" id="salary-range-3" name="qtype[]" value="Doctoral">
                    <label for="salary-range-3">Doctoral</label>
                    <span class="salary-count">150</span>
                </div>
            </div>
        </div><br>
      </div>
    </form>

    

      <div class="right">
          <div class="right1">
            <div class="right-top">
              <h4 class="job_vacancie">98 Jobs &amp; Vacancies</h4>
            </div>
          </div>
          
          <?php
        

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $company = $_POST["company"];
              $location = $_POST["loc"];
              $category = $_POST["cat"];
              
              $sql = "SELECT * FROM JobCards WHERE LOWER(company) LIKE LOWER('%$company%') AND LOWER(country) = LOWER('$location') AND LOWER(category) = LOWER('$category')";
          } 

          else if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $sql = "SELECT * FROM JobCards WHERE 1";

            $search_skills = isset($_GET["search_skills"]) ? $_GET["search_skills"] : "";
            $location = isset($_GET["location"]) ? $_GET["location"] : "";
            $job_types = isset($_GET["job_type"]) ? $_GET["job_type"] : [];
            $exp_types = isset($_GET["exp_type"]) ? $_GET["exp_type"] : [];
            $qtypes = isset($_GET["qtype"]) ? $_GET["qtype"] : [];
        
            // Add conditions to SQL query based on form inputs
            if (!empty($search_skills)) {
                $sql .= " AND (company LIKE '%$search_skills%' OR skills LIKE '%$search_skills%')";
            }
            if (!empty($location)) {
                $sql .= " AND country = '$location'";
            }
            if (!empty($job_types)) {
                $sql .= " AND job_type IN ('" . implode("','", $job_types) . "')";
            }
            if (!empty($exp_types)) {
                $sql .= " AND experience IN ('" . implode("','", $exp_types) . "')";
            }
            if (!empty($qtypes)) {
                $sql .= " AND degree IN ('" . implode("','", $qtypes) . "')";
            }

          }
          
          else {
              $sql = "SELECT * FROM JobCards";
          }
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo '<div class="job-verticle-list">';
                  echo '<div class="vertical-job-card">';
                  echo '<div class="vertical-job-header">';
                  echo '<div class="vrt-job-cmp-logo">';
                  echo '<a href="job-detail.html">';
                  echo '<img src="uploads/' . $row["logo"] . '" class="img-responsive" alt="">';
                  echo '</a>';
                  echo '</div>';
                  echo '<h4><a href="job-detail.html">' . $row["company"] . '</a></h4>';
                  echo '<span class="com-tagline">' . $row["category"] . '</span>';
                  echo '<span class="pull-right">No. <span class="v-count">1</span></span>';
                  echo '</div>';
                  echo '<div class="vertical-job-body">';
                  echo '<div class="row">';
                  echo '<div class="row1">';
                  echo '<ul class="can-skils">';
                  echo '<li><strong>Job Id: </strong>G' . $row["id"] . '</li>';
                  echo '<li><strong>Job Type: </strong>Full Time</li>';
                  echo '<li class="sk"><strong>Skills: </strong>';


                  $skills = $row['skills'];

                  $skillsPoints = explode(',', $skills);

                  foreach ($skillsPoints as $point) {
                      $point = trim($point);
                      if (!empty($point)) {
                        echo '<span class="skill-tag">' . $point . '</span>';
                      }
                    }
                  
                  echo '</li>';
                  echo '<li><strong>Experience: </strong>' . $row["experience"] . '</li>';
                  echo '<li><strong>Location: </strong>' . $row["address"] . ', ' . $row['country'] . '</li>';
                  echo '</ul>';
                  echo '</div>';
                  echo '<div class="row2">';
                  echo '<div class="vrt-job-act">';
                  echo '<a href="#"class="btn-job">Apply Now</a> <br>';
                  echo '<a href="job-detail.php?jobId= '.$row["id"].'" class="view-job">View Job</a>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
              }
          } else {
              echo "0 results";
          }

          ?>















        


          <div class="job-verticle-list">
            <div class="vertical-job-card">
              <div class="vertical-job-header">
                <div class="vrt-job-cmp-logo"> <a href="job-detail.html"><img src="./assets/images/company_logo_1.png" class="img-responsive" alt=""></a> </div>
                <h4><a href="job-detail.html">Apple LTD</a></h4>
                <span class="com-tagline">Software Development</span> <span class="pull-right">No. <span class="v-count">1</span></span> 
                </div>
              <div class="vertical-job-body">
                <div class="row">
                  <div class="row1">
                    <ul class="can-skils">
                      <li><strong>Job Id: </strong>G58726</li>
                      <li><strong>Job Type: </strong>Full Time</li>
                      <li class="sk"><strong>Skills: </strong> 
                        <div class="sks">
                        <span class="skill-tag">HTML</span>
                        <span class="skill-tag">css</span> 
                        <span class="skill-tag">java</span> 
                        <span class="skill-tag">php</span>
                        </div> 
                      </li>
                      <li><strong>Experience: </strong>3 Year</li>
                      <li><strong>Location: </strong>2844 Counts Lane, KY 45241</li>
                    </ul>
                  </div>
                  <div class="row2">
                    <div class="vrt-job-act"> 
                      <a href="#"class="btn-job">Apply Now</a> <br>
                      <a href="job-detail.html"class="view-job">View Job</a> 
                    </div>
                  </div>
                </div>
              </div>            
            </div>
          </div>
          
          
        
      <div class="pages">
        <ul class="pagination">
          <li class="page-item"> <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">«</span> <span class="sr-only">Previous</span> </a> </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">»</span> <span class="sr-only">Next</span> </a> </li>
        </ul>
      </div>
        </div>

  </div>

    
 

    <footer style="bottom: 0;">
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
    <script src="job-search.js"></script>
    <script src="log.js"></script>
</body>
</html>