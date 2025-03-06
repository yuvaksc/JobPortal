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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="./css/headfoot.css">
    <link rel="stylesheet" href="./css/edit_profile.css">
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

    <section class="gray">
        <div class="container">
            <form class="c-form" method='post' action='prof.php'>
                
                <!-- General Information -->
                <div class="box">
                    <div class="box-header">
                        <h4>General Information</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                        
                            <div class="col-sm-4">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" fdprocessedid="01s0wl">
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" fdprocessedid="ky58j">
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" fdprocessedid="v5kx4n">
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" fdprocessedid="rw4q5">
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Designation</label>
                                <input type="text" name="desig" class="form-control" fdprocessedid="a9lhkl">
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Category</label>
                                <select class="wide-form-control" name="category">
                                    <option hidden>Location</option>
                                    <option data-display="Location" value="Information Of Technology">Information Of Technology</option>
                                    <option value="Hardware">Hardware</option>
                                    <option value="Machanical">Machanical</option>
                                </select>
                                
                            </div>
                            
                            <div class="col-sm-4 m-clear">
                                <label>Experience</label>
                                <select class="wide-form-control" style="display: block;" name="exp">
                                    <option hidden>No Experience</option>
                                    <option data-display="Experience" value="0 To 6 Month">0 To 6 Month</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Year">2 Year</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-4 m-clear">
                                <label>Job Type</label>
                                <select class="wide-form-control" name="jobtype">
                                    <option hidden>Type</option>
                                    <option data-display="Job Type"  value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Freelancer">Freelancer</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-4 m-clear">
                                <label>Expect Package</label>
                                <select class="wide-form-control" name="pcg">
                                    <option hidden>Package</option>
                                    <option data-display="Package" value="$12 / hr">$12 / hr</option>
                                    <option value="$21 / hr">$21 / hr</option>
                                    <option value="$35 / hr">$35 / hr</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-12 m-clear">
                                <label>Skills</label>
                                <input name="skills" type="text" class="form-control" placeholder="CSS, Photoshop, Js, Bootstrap" fdprocessedid="hllx4t">
                            </div>
                            
                            <div class="col-sm-12">
                                <label>Career</label>
                                <textarea name="career" class="form-control" placeholder="Career"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <!-- Personal Detail & Address -->
                <div class="box">
                    <div class="box-header">
                        <h4>Personal Detail &amp; Address</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                        
                            <div class="col-sm-4">
                                <label>Birth</label>
                                <input name="birth" type="date" id="reservation-date" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" fdprocessedid="1gfddr">
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Address</label>
                                <input name="address" type="text" class="form-control" fdprocessedid="ykgo">
                            </div>
                            
                            <div class="col-sm-4">
                                <label>City</label>
                                <select class="wide-form-control" name="city">
                                    <option hidden>City</option>
                                    <option data-display="City" value="Allahabad">Allahabad</option>
                                    <option value="Faizabad">Faizabad</option>
                                    <option value="Sultanpur">Sultanpur</option>
                                    <option value="Pratapgarh">Pratapgarh</option>
                                    <option value="Basti">Basti</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-4 m-clear">
                                <label>State</label>
                                <select class="wide-form-control" name="state">
                                    <option hidden>State</option>
                                    <option data-display="State" value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttrakhand">Uttrakhand</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Punjab">Punjab</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-4 m-clear">
                                <label>Country</label>
                                <select class="wide-form-control" name="country">
                                    <option hidden>Country</option>
                                    <option data-display="Country" value="India">India</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Austrailia">Austrailia</option>
                                    <option value="New ZeLand">New ZeLand</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-4 m-clear">
                                <label>Zip Code</label>
                                <input name="zipcode" type="text" class="form-control" fdprocessedid="iravi">
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                
                <div class="box">
                    <div class="box-header">
                        <h4>Add Qualification</h4>
                    </div>
                    <div class="box-body">
                        <div class="extra-field-box" id="qualification-box">
                            <div class="multi-box">    
                                <div class="dublicat-box">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Degree Name</label>
                                            <input name="degree[]" type="text" class="form-control" placeholder="Degree Name | Institution" fdprocessedid="u76ch">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Description</label>
                                            <input name="deg-desc[]" type="text" class="form-control" fdprocessedid="vfaex">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Date From</label>
                                            <input name="deg-from[]" type="text" class="form-control date-from" fdprocessedid="wy4t0k">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Date To</label>
                                            <input name="deg-to[]" type="text" class="form-control date-to" fdprocessedid="u0elts">
                                        </div>
                                    </div>
                                    <button type="button" class="remove-btn" onclick="removeQualification(this)">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center"><button type="button" class="add-btn" onclick="addQualification()">Add More</button></div>
                    </div>
                </div>

                <!-- Add Skills -->
                <div class="box">
                    <div class="box-header">
                        <h4>Add Skills</h4>
                    </div>
                    <div class="box-body">
                    
                        <div class="extra-field-box"  id="skill-box">
                            <div class="multi-box">	
                                <div class="dublicat-box">
                                    <div class="row">
    
                                        <div class="col-sm-6">
                                            <label>Designation</label>
                                            <input name="designation[]" type="text" class="form-control" placeholder="Designation | Employer" fdprocessedid="bh6x78">
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <label>Describe your work</label>
                                            <input name="desig-desc[]" type="text" class="form-control" fdprocessedid="65vd8y">
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <label>Date From</label>
                                            <input name="desig-from[]" type="text" id="e-date-from" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control"  fdprocessedid="qr8nnl">
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <label>Date To</label>
                                            <input name="desig-to[]" type="text" id="e-date-to" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control"  fdprocessedid="4mkoee">
                                        </div>
                                        
                                    </div>
                                    <button type="button" class="remove-btn"   onclick="removeskill(this)">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center"><button type="button" class="add-btn" onclick="addskills()">Add More</button></div>
                    </div>
                </div>
                
                <!-- Social Accounts -->
                <div class="box">
                    <div class="box-header">
                        <h4>Social Accounts</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            
                            <div class="col-sm-4">
                                <label><i class="fa fa-facebook mrg-r-5"></i>Facebook</label>
                                <input name="facebook" type="text" class="form-control" fdprocessedid="2lu1uq">
                            </div>
                            
                            <div class="col-sm-4">
                                <label><i class="fa fa-google-plus mrg-r-5"></i>Google +</label>
                                <input name="google" type="text" class="form-control" fdprocessedid="4w0h">
                            </div>
                            
                            <div class="col-sm-4">
                                <label><i class="fa fa-twitter mrg-r-5"></i>Twitter</label>
                                <input name="twitter" type="text" class="form-control" fdprocessedid="xfyrdh">
                            </div>
                            
                            <div class="col-sm-4">
                                <label><i class="fa fa-linkedin mrg-r-5"></i>LinkedIn</label>
                                <input name="linkedin" type="text" class="form-control" fdprocessedid="rl8aef">
                            </div>
                            
                            <div class="col-sm-4">
                                <label><i class="fa fa-pinterest mrg-r-5"></i>Pinterest</label>
                                <input name="pinterest" type="text" class="form-control" fdprocessedid="j3d3sb">
                            </div>
                            
                            <div class="col-sm-4">
                                <label><i class="fa fa-instagram mrg-r-5"></i>Instagram</label>
                                <input name="insta" type="text" class="form-control" fdprocessedid="fdwesl">
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                
                <div class="text-center">
                    <button type="submit" class="sub-btn" fdprocessedid="w3lxv">Submit &amp; Exit</button>
                </div>
                
            </form>
        </div>
    </section>


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

    <script src="edit_profile.js"></script>
    <script src="log.js"></script>

</body>
</html>