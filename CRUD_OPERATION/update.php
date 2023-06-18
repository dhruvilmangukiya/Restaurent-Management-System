<!DOCTYPE html>
<html>

<head>

    <?php include '../Included_Folder/links.php' ?>
    <title>Tulsi Restaurants</title>
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
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Add Products</h4>
            <p class="text-center boldfont">You Can Update Products Very Easily</p>
            <form  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

            <?php 
                include '../connection/dbcon.php';
                if(isset($_GET['id'])){
                    $ids = $_GET['id'];

                    $showquery = "select * from product where id={$ids}";
                    $showdata = mysqli_query($con, $showquery);
                    $arrdata = mysqli_fetch_array($showdata);

                    $pname = $arrdata['pname'];
                    $img   = $arrdata['img'];
                    $price = $arrdata['price'];
                    $stock = $arrdata['stock'];

                }

                if (isset($_POST['submit'])) {
                    $idupdate = $_POST['id'];
    
                    $pname = $_POST['pname'];
                    $img   = $_POST['img'];
                    $price = $_POST['price'];
                    $stock = $_POST['stock'];

                    $query = "UPDATE product set pname='$pname', img='$img', price='$price', stock='$stock' where id=$idupdate ";
                    $res = mysqli_query($con, $query);

                    if ($res) {
                        ?>
                        <script>
                            alert('Product Updated Successfully');
                            location.replace("../Pages/product.php");
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert('Product Not Updated');
                        </script>
                        <?php
                    }
                }   
            ?>
                <div class="form-group input-group">
                    <input type="text" class="form-control" placeholder="Enter Product Name" name="pname" value="<?php echo (isset($pname))? $pname:'';?>" required />
                </div>
                <div class="form-group input-group">
                    <input type="file" class="form-control-file" name="img" value="<?php echo (isset($img))? $img:'';?>" id="exampleFormControlFile1" required/>
                </div>

                <div class="form-group input-group">
                        <input type="number" class="form-control" placeholder="Enter Product Price" name="price" value="<?php echo (isset($price))? $price:'';?>" required />
                </div>

                <div class="form-group input-group">
                        <input type="number" class="form-control" placeholder="Enter Product Stocks" name="stock" value="<?php echo (isset($stock))? $stock:'';?>" required />
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lock">Update Product</button>
                    <input type="hidden" name="id" value="<?php echo $ids; ?>" />
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