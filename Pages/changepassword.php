<!DOCTYPE html>
<html>

<head>

    <?php include '../Included_Folder/links.php' ?>
    <title>Tulsi Restaurant</title>

</head>

<body class="sub_page">

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
            <h4 class="card-title mt-3 text-center">Change Password</h4>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <?php 
                include '../connection/dbcon.php';
                if(isset($_GET['id'])){
                    $adminid = $_GET["id"]; 
                }
                if(isset($_POST["submit"])){
                    $id = $_POST["id"];
                    $oldpass = $_POST["oldpass"];
                    $newpass = $_POST["newpass"];
                    $cpass = $_POST["cpass"];

                    $selectquery = "SELECT * FROM user WHERE id={$id}";
                    $selectrecord = mysqli_query($con, $selectquery);

                    $result = mysqli_fetch_array($selectrecord);
                    $db_pass = $result["password"];

                    $hashnewpass = password_hash($newpass, PASSWORD_BCRYPT);
                    if( password_verify($oldpass, $db_pass)){
                        if($newpass === $cpass){
                            $updatequery = "UPDATE user SET password='$hashnewpass' WHERE id=$id";
                            $updaterecord = mysqli_query($con, $updatequery);

                            if($updaterecord){
                                ?>
                                    <script>
                                        alert("Password Change Successfully");
                                        location.replace("../Pages/profile.php");
                                    </script>
                                <?php
                            }
                            else{
                                ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <h5 class="m-0">Password Not Changed...!</h5>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                            }
                        }
                        else{
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <h5 class="m-0">Password & Confirm Password Are Not Matching...!</h5>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                        }    
                    }
                    else{
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h5 class="m-0">Incorrect Old Password...!</h5>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                    }
                }    
            ?>

            <form  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return validateform()">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="padding: 0 14px;"><i class="fa fa-lock"></i></span>
                    </div>
                        <input type="password" class="form-control" placeholder="Enter Old Password" name="oldpass" value="" required />
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="padding: 0 14px;"><i class="fa fa-lock"></i></span>
                    </div>
                        <input type="password" class="form-control" placeholder="Enter New Password" name="newpass" value="" required />
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="padding: 0 14px;"><i class="fa fa-lock"></i></span>
                    </div>
                        <input type="password" class="form-control" placeholder="Enter Confirm Password" name="cpass" required />
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lock">Change Password</button>
                    <input type="hidden" class="form-control" placeholder="Enter Confirm Password" name="id" value=<?php echo isset($adminid) ? $adminid : ""; ?>  />
                </div>
                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-danger btn-lock"><a href="../Pages/profile.php" style="color: #fff;">Cancel</a></button>
                </div>
                
            </form>
        </article>
    </div>

  <!-- footer section -->
    <?php include '../Included_Folder/footer.php' ?>
  <!-- footer section -->

  <?php include '../Included_Folder/script.php' ?>

</body>

</html>