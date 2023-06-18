<!DOCTYPE html>
<html>

<head>

    <?php include '../Included_Folder/links.php' ?>
    <title>Tulsi Restaurant</title>
    <?php include '../Included_Folder/not_login.php' ?>

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
        <article class="card-body mx-auto" style="min-width: 450px;">
            <h4 class="card-title mt-3 text-center">Order Online</h4>
            <p class="text-center boldfont">Now You Can Order Online Very Easily</p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <form  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                <?php 
                    include '../connection/dbcon.php';
                    if(isset($_GET['id'])){
                        $ids = $_GET['id'];

                        $showquery = "select * from product where id={$ids}";
                        $showdata  = mysqli_query($con, $showquery);
                        $arrdata   = mysqli_fetch_array($showdata);

                        $pname = $arrdata['pname'];
                        $price = $arrdata['price'];
                    }

                    if (isset($_POST['submit'])) {
                    
                        $pname    = $_POST['pname'];
                        $quantity = $_POST['quantity'];
                        $price    = $_POST['price'];
                        $mobile   = $_POST['mobile'];
                        $address  = $_POST['address'];

                
                        $orderquery = "INSERT INTO `order` (`id`, `pname`, `quantity`, `price`, `mobile`, `address`) VALUES (NULL, '$pname', '$quantity', '$price', '$mobile', '$address');";
                        
                        $res= mysqli_query($con, $orderquery);

                        if($res){
                            ?>
                            <script>
                                alert('Order Successfully Placed');
                                location.replace("../Pages/showorder.php");
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                alert('Order Not Placed');
                            </script>
                            <?php
                        }
                    }
                ?>

                <div class="form-group input-group">
                    <input type="text" class="form-control" readonly placeholder="Enter Product Name" value="<?php echo (isset($pname))? $pname:'';?>" name="pname" required />
                </div>

                <div class="form-group input-group">
                    <input type="number" class="form-control" placeholder="Enter Quantity" name="quantity" required />
                </div>

                <div class="form-group input-group">
                    <input type="number" class="form-control" readonly placeholder="Enter Product Price" value="<?php echo (isset($price))? $price:'';?>" name="price" required />
                </div>

                <div class="form-group input-group">
                    <input type="number" class="form-control" placeholder="Enter Mobile Number" name="mobile" required />
                </div>

                <div class="form-group input-group">
                    <input type="text" class="form-control" placeholder="Enter Your Address" name="address" required />
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lock">Order Confirm</button>
                </div>
                
                <p class="text-center">Back to home page <a href="../Pages/dashboard.php">Click Here</a></p>
            </form>
        </article>
    </div>

  <!-- footer section -->
  <?php include '../Included_Folder/footer.php' ?>
  <!-- footer section -->

  <?php include '../Included_Folder/script.php' ?>

</body>
</html>


