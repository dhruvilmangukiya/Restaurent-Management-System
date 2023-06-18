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

            $email = $_POST['email'];
            $password = $_POST['password'];

            $email_search =  "select * from user where email = '$email'";

            $query = mysqli_query($con, $email_search);

            $email_count = mysqli_num_rows($query);

            if($email_count){
                $email_pass = mysqli_fetch_assoc($query);

                $dbpass = $email_pass['password'];
                
                $_SESSION['id'] = $email_pass['id'];
                $_SESSION['username'] = $email_pass['username'];
                $_SESSION['email']    = $email_pass['email'];
                $_SESSION['mobile']   = $email_pass['mobile'];
                $_SESSION['image']    = $email_pass['image'];


                $pass_decode = password_verify($password, $dbpass);

                if($pass_decode){
                    $_SESSION['status'] = "Login Successful";
                    $_SESSION['status_code'] = "success";
                }
                else{
                    $_SESSION['status'] = "Password Incorrect";
                    $_SESSION['status_code'] = "error";
                }
            }
            else{
                $_SESSION['status'] = "Invalid Email";
                $_SESSION['status_code'] = "error";
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
            <h4 class="card-title mt-3 text-center">Login Account</h4>
            <p class="text-center boldfont">Login To Your Account</p>
            <p class="social-media">
                <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>Login via Gmail</a>
                <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook"></i>Login via Facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <form  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                        <input type="email" class="form-control" placeholder="Email ID" name="email" required />
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="padding: 0 16px;"><i class="fa fa-lock"></i></span>
                    </div>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="" required />
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lock">Login Now</button>
                </div>
                <p class="text-center">Don't Have an account? <a href="signup.php">Sign Up</a></p>
            </form>
        </article>
    </div>

  <!-- footer section -->
  <?php include '../Included_Folder/footer.php' ?>
  <!-- footer section -->

  <?php include '../Included_Folder/script.php' ?>

</body>

</html>