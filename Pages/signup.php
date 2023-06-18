<!DOCTYPE html>
<html>

<head>

    <?php include '../Included_Folder/links.php' ?>
    <title>Tulsi Restaurant</title>

</head>

<body class="sub_page">

    <?php
        include '../connection/dbcon.php';
        if (isset($_POST['submit'])) {

            $username = mysqli_real_escape_string($con, $_POST['username']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

            $pass = password_hash($password, PASSWORD_BCRYPT);
            $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

            $emailquery =  "select * from user where email = '$email'";

            $query = mysqli_query($con, $emailquery);

            $emailcount = mysqli_num_rows($query);

            if($emailcount > 0){
                ?>
                    <script>
                        alert('Email Already Exists');
                    </script>
                <?php
            }
            else{
                if($password === $cpassword){

                        $insertquery = "INSERT INTO user(username,email,mobile,password) VALUES ('$username','$email','$mobile','$pass')";

                        $iquery = mysqli_query($con, $insertquery);
                        if ($iquery) {
                            ?>
                            <script>
                                alert('Registration Successfully');
                                location.replace("login.php");
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                alert('Registration Failed');
                            </script>
                            <?php
                        }
                }
                else{
                    ?>
                        <script>
                            alert('Password Are Not Matching');
                        </script>
                    <?php
                }
            }
            
        }
    ?>


  <div class="hero_area">
    <div class="bg-box">
      <img src="../images/hero-bg.jpg" alt="">
    </div>
    
    <!-- header section strats -->
    <?php include '../Included_Folder/navbar.php' ?>
    <!-- end header section -->
  </div>

  <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center boldfont">It's Free And Takes Less Then 30 Seconds</p>
            <p class="social-media">
                <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>Login via Gmail</a>
                <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook"></i>Login via Facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <form  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return validateform()">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                        <input type="text" class="form-control" id="username" placeholder="Enter your name" name="username" required />
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="padding: 0 10px;"><i class="fa fa-envelope"></i></span>
                    </div>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email Adderess" name="email" required />
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                        <input type="number" class="form-control" id="mobile" placeholder="Enter Phone Number" name="mobile" required />
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="padding: 0 14px;"><i class="fa fa-lock"></i></span>
                    </div>
                        <input type="password" class="form-control" placeholder="Enter New Password" name="password" value="" required />
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="padding: 0 14px;"><i class="fa fa-lock"></i></span>
                    </div>
                        <input type="password" class="form-control" placeholder="EnterRepeat Password" name="cpassword" required />
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lock">Create Account</button>
                </div>
                <p class="text-center">Have an account? <a href="login.php">Log In</a></p>
            </form>
        </article>
    </div>

  <!-- footer section -->
  <?php include '../Included_Folder/footer.php' ?>
  <!-- footer section -->

  <?php include '../Included_Folder/script.php' ?>

</body>

</html>