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
    <link rel="stylesheet" href="./css/post-job.css">
</head>
<body>
    <header>
        <nav class="header-navbar header-navbar-active">
            <div class="header-container">
            <a href="#" class="header-logo">
                <img id='header-main-logo' src="assets/images/logo-dark.png" alt="Logo">
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
        <img id='top-img' src="assets/images/top.png">
        <h1 class="top-text">Job Post</h1>
    </div>
    <br><br><br><br><br><br><br>

    
    <div class="container">
        <div class="head"><h2>General Information</h2></div>
        <form action="jobpost.php" method="post" enctype="multipart/form-data">
            <div class="form first">
                <div>
                    <div class="fields">
                        <div class="input-field">
                            <label>Job Title</label>
                            <input name="title" type="text" placeholder="Job Title" required>
                        </div>
                        <div class="input-field">
                            <label>Company Name</label>
                            <input name="company" type="text" placeholder="Company Name" >
                        </div>
                        <div class="input-field">
                            <label>Category</label>
                            <select name="category">
                                <option disabled selected>Category</option>
                                <option>Information Technology</option>
                                <option>Hardware</option>
                                <option>Mechanical</option>
                                <option>Business</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Description</label>
                            <input name="desc" type="text" placeholder="Description" >
                        </div>
                        <div class="input-field">
                            <label>Salary Range</label>
                            <select name="salary">
                                <option disabled selected>Salary Range</option>
                                <option>1,00,000</option>
                                <option>2,00,000</option>
                                <option>3,00,000</option>
                                <option>4,00,000</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Vacancy</label>
                            <input name="vacancy" type="Number" placeholder="No.of Vacancy" >
                        </div>

                        <div class="input-field">
                            <label>Experience</label>
                            <select name="exp">
                                <option disabled selected>Experience</option>
                                <option>0 To 6 months</option>
                                <option>1-2 Years</option>
                                <option>2-3 Years</option>
                                <option>3-4 Years</option>
                                <option>>4 Years</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Degree</label>
                            <select name="degree">
                                <option disabled selected>Degree</option>
                                <option>Diploma</option>
                                <option>Bachelors Degree</option>
                                <option>Masters Degree</option>
                                <option>Doctoral Degree</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Job Type</label>
                            <select  name="jobtype">
                                <option disabled selected>Job Type</option>
                                <option>Full Time</option>
                                <option>Part Time</option>
                                <option>Freelancer</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Responsibilities</label>
                            <textarea class="Responsibilities" name="responsibilities" rows="7"></textarea>
                        </div>

                        <div class="input-field">
                            <label>Qualifications</label>
                            <textarea class="Qualifications" name="qualifications" rows="7"></textarea>
                        </div>

                        <div class="input-field">
                            <label>Skills</label>
                            <textarea class="Skills" name="skills" rows="7"></textarea>
                        </div>
                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                    </button>
                </div>
            </div>


            
            <div class="form second">
                <div class="details address">
                    <div class="fields">
                        <div class="input-field">
                            <label>Email</label>
                            <input name="email" type="email" placeholder="Email" >
                        </div>
                        <div class="input-field">
                            <label>Phone Number</label>
                            <input name="phone" type="text" placeholder="Phone Number" >
                        </div>
                        <div class="input-field">
                            <label>Website Link</label>
                            <input name="weblink" type="text" placeholder="Link" >
                        </div>
                        <div class="input-field">
                            <label>Address</label>
                            <input name="address" type="text" placeholder="Address" >
                        </div>
                        <div class="input-field">
                            <label>City</label>
                            <input name="city" type="text" placeholder="City" >
                        </div>
                        <div class="input-field">
                            <label>State</label>
                            <input name="state" type="text" placeholder="State" >
                        </div>
                        <div class="input-field">
                            <label>Country</label>
                            <input name="country" type="text" placeholder="Country" >
                        </div>
                        
                        <div class="input-field">
                            <label>Zip Code</label>
                            <input name="zipcode" type="number" placeholder="Zip-Code" >
                        </div>

                        <div class="input-field">
                            <label>Company Logo</label>
                            <input name="logo" type="file" placeholder="No File Chosen" >
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <div class="backBtn">
                        <span class="btnText">Back</span>
                    </div>
                    
                    <button class="sumbit">
                        <span class="btnText">Submit</span>
                    </button>
                </div>
            </div> 
        </form>
    </div>

    <br><br><br><br><br><br><br>

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
    
    <script src="post-job.js"></script>
    <script src="log.js"></script>
</body>
</html>