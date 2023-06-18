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

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          <?php 
            echo isset($_SESSION['id']) ? "Book A Table" : "";
          ?> 
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return booktableform()">
                <?php 
                    include '../connection/dbcon.php';

                    if (isset($_POST['submit'])) {
                    
                        $name    = $_POST['name'];
                        $mobile = $_POST['mobile'];
                        $person    = $_POST['person'];
                        $table   = $_POST['table'];
                        $datetime  = $_POST['datetime'];

                        $booktablequery = "INSERT INTO `booktable` (`id`, `name`, `mobile`, `person`, `table`, `datetime`) VALUES (NULL, '$name', '$mobile', '$person', '$table', '$datetime');";
                        
                        if(isset($_SESSION['id'])){ 
                          $res= mysqli_query($con, $booktablequery);
                        }else{
                          ?>
                            <script>
                                alert('You Have Not Login Please Login...');
                                location.replace("../Pages/login.php");
                            </script>
                          <?php
                        }

                        if($res){
                            ?>
                            <script>
                                alert('Table Successfully Booked');
                                location.replace("../Pages/booknow.php");
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                alert('Table Not Booked');
                            </script>
                            <?php
                        }
                    }
                ?>
              <div>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required/>
              </div>
              <div>
                <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Phone Number" required/>
              </div>
              <div>
                <input type="number" class="form-control" id="person" name="person" placeholder="How many persons?" required/>
              </div>
              <div>
                <input type="number" class="form-control" id="table" name="table" placeholder="How many tables?" required/>
              </div>
              <div>
                <input type="datetime-local" class="form-control" id="datetime" name="datetime" required/>
              </div>

              <div class="btn-box">
                <button type="submit" name="submit" class="btn btn-primary btn-lock"  style="font-weight: 600;">Book Now</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->

  <!-- footer section -->
  <?php include '../Included_Folder/footer.php' ?>
  <!-- footer section -->

  <?php include '../Included_Folder/script.php' ?>

</body>

</html>