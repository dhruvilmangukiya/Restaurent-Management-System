<!DOCTYPE html>
<html>

<head>

  <?php include '../Included_Folder/links.php' ?>
  <title>Tulsi Restaurant</title>
  <?php include '../Included_Folder/not_login.php' ?>

  <style>
    .social-icon a {
      padding: 1rem;
    }

    .social-icon a i {
      font-size: 25px;
    }

    .log-edit {
      padding: 0px 50px;
    }

    .log-edit button {
      font-size: 17px;
    }

    .details div {
      padding: 5px 0;
    }

    .changeprofile {
      margin: 0 0 0 54px;
    }
  </style>

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

  <section class="" style="background-color: #eee;">
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-4">

          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">

              <?php
              include '../connection/dbcon.php';
              if (isset($_GET['id'])) {
                $ids = $_GET['id'];

                $showquery = "select * from user where id={$ids}";
                $showdata = mysqli_query($con, $showquery);
                $arrdata = mysqli_fetch_array($showdata);

                $username = $arrdata['username'];
                $mobile = $arrdata['mobile'];
              }
              if (isset($_POST['submit'])) {
                $idupdate = $_POST['id'];

                $username = $_POST['username'];
                $mobile = $_POST['mobile'];
                $image = $_POST['file'];

                $query = "UPDATE user set username='$username', mobile='$mobile', image='$image'  where id=$idupdate ";
                $res = mysqli_query($con, $query);


                if ($res) {
                  $fetchQuery = "SELECT * FROM user WHERE id = {$idupdate}";
                  $result = mysqli_query($con, $fetchQuery);
                  $data = mysqli_fetch_assoc($result);
                  $_SESSION['id'] = $data['id'];
                  $_SESSION['username'] = $data['username'];
                  $_SESSION['email']    = $data['email'];
                  $_SESSION['mobile']   = $data['mobile'];
                  $_SESSION['image']    = $data['image'];
              ?>
                  <script>
                    alert('Profile Updated Successfully');
                    location.replace("../Pages/profile.php");
                  </script>
                <?php
                } else {
                ?>
                  <script>
                    alert('Profile Not Updated');
                  </script>
              <?php
                }
              }
              ?>

              <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-date" onsubmit="return profilevalidateform()">
                <div class="mt-3 mb-4">
                  <?php
                  if ($_SESSION['image'] == NULL) {
                    echo ('<img src="../images/client3.jpg" class="rounded-circle img-fluid" style="width: 130px; height:130px;" />');
                  } else {
                    echo ("<img src='../images/{$_SESSION['image']}' class='rounded-circle img-fluid' style='width: 130px; height:130px;' />");
                  }
                  ?>
                </div>

                <div class="changeprofile mb-4">
                  <input type="file" name="file">
                </div>

                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" id="username" placeholder="Enter your name" name="username" value="<?php echo (isset($username)) ? $username : ''; ?>" required />
                </div>

                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                  </div>
                  <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile No" name="mobile" value="<?php echo (isset($mobile)) ? $mobile : ''; ?>" required />
                </div>

                <div class="row d-flex justify-content-between log-edit">
                  <button type="submit" class=" mt-3 btn btn-primary btn-rounded btn-lg" name="submit" style="color: white;">Save Profile</button>
                  <input type="hidden" name="id" value="<?php echo $ids; ?>" />
                </div>
                <div class="row d-flex justify-content-between log-edit">
                  <button type="submit" class=" mt-3 btn btn-danger btn-rounded btn-lg"><a href="../Pages/profile.php" style="color: white;">Cancel</a></button>
                </div>

                <div class="mt-4 pb-2 d-flex social-icon justify-content-center">
                  <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                  <a href="">
                    <i class="fa fa-pinterest" aria-hidden="true"></i>
                  </a>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <?php include '../Included_Folder/footer.php' ?>
  <!-- footer section -->

  <?php include '../Included_Folder/script.php' ?>
  <script>
    function profilevalidateform()
    {
        let username = document.getElementById('username');
        let mobile = document.getElementById('mobile');

        if(checkusername(username))
        {
            if(checkmobile(mobile))
            {
              return true;              
            }
        }
        return false;
    }
    function checkusername(element)
    {
        const validate=element.value.match(/^[a-z A-Z]+$/);
        if(validate)
        {
            return true;
        }
        else{
            alert("You must conyains only letters....!");
            element.focus();
            return false;
        }
    }

    function checkmobile(element) {
        const validateNum = element.value.match(/[1-9]{1}[0-9]{9}/);
        if (validateNum && element.value.length == 10) {
            return true;
        } else {
            alert("Please Enter Valid Mobile Number, It's must contain maximum 10 Numbers...!");
            element.focus();
            return false;
        }
    }
  </script>

</body>

</html>