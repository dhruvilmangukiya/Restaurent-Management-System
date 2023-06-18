<!DOCTYPE html>
<html>
<head>

    <?php include '../Included_Folder/links.php' ?>
    <title>Tulsi Restaurant</title>
    <?php include '../Included_Folder/not_login.php' ?>

</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="../images/hero-bg.jpg" alt="">
    </div>

    <!-- header section strats -->
    <?php include '../Included_Folder/navbar.php' ?>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Fast Food Restaurant
                    </h1>
                    <p>
                      Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                    </p>
                    <div class="btn-box">
                      <a href="menu.php" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Fast Food Restaurant
                    </h1>
                    <p>
                      Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                    </p>
                    <div class="btn-box">
                      <a href="menu.php" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Fast Food Restaurant
                    </h1>
                    <p>
                      Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                    </p>
                    <div class="btn-box">
                      <a href="menu.php" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- offer section -->

  <section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="../images/o1.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Tasty Thursdays
                </h5>
                <h6>
                  <span>20%</span> Off
                </h6>
                <a href="menu.php">Order Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="../images/o2.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Pizza Days
                </h5>
                <h6>
                  <span>15%</span> Off
                </h6>
                <a href="menu.php">Order Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".burger">Burger</li>
        <li data-filter=".pizza">Pizza</li>
        <li data-filter=".pasta">Pasta</li>
        <li data-filter=".fries">Fries</li>
      </ul>

      <div class="filters-content">
        <div class="row grid">
          <?php
              include '../connection/dbcon.php';

              $selectquery = "SELECT * FROM product LIMIT 9";

              $query = mysqli_query($con, $selectquery);

              while ($res = mysqli_fetch_array($query)) {                    
                ?>               
    
                  <div class="col-sm-6 col-lg-4 all burger pizza pasta fries">
                    <div class="box">
                      <div>
                        <div class="img-box">
                          <img src="../images/<?php echo $res['img']; ?>" alt="">
                        </div>
                        <div class="detail-box">
                          <h5><?php echo $res['pname']; ?></h5>
                          <p>
                            Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque
                          </p>
                          <div class="options">
                            <h6>&#8377;<!-- Indian Rupees Symbol --><?php echo $res['price'];?></h6>
                            <a href="orderonline.php?id=<?php echo $res['id'] ?>" id="ordernow">Order Now</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                <?php
              }
            ?>
        </div>
      </div>
      <div class="btn-box">
        <a href="menu.php">
          View More
        </a>
      </div>
    </div>
  </section>

  <!-- end food section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="../images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                We Are Tulsi
              </h2>
            </div>
            <p>
              We eat with our eyes first, but before we see our food, we picture it while reading the menu descriptions. They say one image is worth a thousand words, but don’t underestimate the power of words. A few strategically placed words here and there can make your food and wine descriptions increase your restaurant’s sales.<br/><br/>
              Here are 20 beautiful descriptions of food and wine you can use in your restaurant menu.
            </p>
            <a href="about.php">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

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
                                alert('Please Login');
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

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          What Says Our Customers
        </h2>
      </div>
      <div class="carousel-wrap row ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Great selection! My go to favorite is the Cape Cod Ruben. We also love their pizza. I just had the mushroom risotto with scallops and loved it! and The staff is always so friendly and accommodating.
                </p>
                <h6>
                  Nancy Wheeler
                </h6>
                <p>
                  Hawkins
                </p>
              </div>
              <div class="img-box">
                <img src="../images/client4.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  The food was excellent and so was the service.  I had the mushroom risotto with scallops which was awesome. My wife had a burger over greens (gluten-free) which was also very good.
                </p>
                <h6>
                  Dustin Henderson
                </h6>
                <p>
                  Hawkins
                </p>
              </div>
              <div class="img-box">
                <img src="../images/client3.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->
    
  <!-- footer section -->
  <?php include '../Included_Folder/footer.php' ?>
  <!-- footer section -->

  <?php include '../Included_Folder/script.php' ?>

</body>

</html>