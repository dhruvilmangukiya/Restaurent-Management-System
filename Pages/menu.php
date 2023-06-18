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

  <!-- food section -->

  <section class="food_section layout_padding">
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

            $selectquery = "select * from product";

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
                          <a href="orderonline.php?id=<?php echo $res['id']; ?>" id="ordernow">Order Now</a>
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
        <a href="">
          View More
        </a>
      </div>
    </div>
  </section>

  <!-- end food section -->

  <!-- footer section -->
  <?php include '../Included_Folder/footer.php' ?>
  <!-- footer section -->

  <?php include '../Included_Folder/script.php' ?>

</body>

</html>