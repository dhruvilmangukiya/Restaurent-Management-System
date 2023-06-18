<!DOCTYPE html>
<html>

<head>

    <?php include '../Included_Folder/links.php' ?>
    <title>Tulsi Restaurant</title>
    <?php include '../Included_Folder/not_login.php' ?>

    <style>
        .social-icon a{
            padding: 1rem;
        }
        .social-icon a i{
            font-size: 25px;
        }
        .log-edit{
          padding: 0px 50px;
        }
        .log-edit button{
          font-size: 17px;
        }
        .details div{
          padding: 5px 0;
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

            <div class="mt-3 mb-4">
              <?php 
                if($_SESSION['image'] == NULL)
                {
                  echo('<img src="../images/client3.jpg" class="rounded-circle img-fluid" style="width: 130px; height:130px;" />');
                }else{
                  echo("<img src='../images/{$_SESSION['image']}' class='rounded-circle img-fluid' style='width: 130px; height:130px;' />");
                }
              ?>
            </div>

            <h4 class="mb-2"><?php echo $_SESSION['username']; ?></h4>

            <div class="details justify-content-between mb-4 mt-4"> 
                <div>
                  <?php echo $_SESSION['mobile']; ?>
                </div>
                <div>  
                    <a style="color: #007bff;" href="mailto:<?php echo $_SESSION['email']; ?>">
                      <?php echo $_SESSION['email']; ?>
                    </a>
                </div>
            </div>

            <div class="row d-flex justify-content-between log-edit">               
                <button type="button" class=" mt-3 btn btn-primary btn-rounded btn-lg">
                  <a style="color: white;" href="../Pages/editprofile.php?id=<?php echo $_SESSION['id']; ?>">Edit Profile</a>
                </button>
                <button type="button" class=" mt-3 btn btn-primary btn-rounded btn-lg">
                  <a style="color: white;" href="../Pages/changepassword.php?id=<?php echo $_SESSION['id']; ?>">Change Password</a>
                </button>
                <button type="button" class=" mt-3 btn btn-primary btn-rounded btn-lg">
                  <a style="color: white;" href="../Pages/logout.php">logout</a>
                </button>
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

</body>

</html>