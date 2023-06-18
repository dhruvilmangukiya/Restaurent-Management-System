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
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Add Products</h4>
            <p class="text-center boldfont">You Can Add Products Very Easily</p>
            <form  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return productvalidateform()">

            <div class="form-group input-group">
                        <input type="text" class="form-control" id="pname" placeholder="Enter Product Name" name="pname" required />
                </div>
                <div class="form-group input-group">
                    <input type="file" class="form-control-file" value="" name="img" id="exampleFormControlFile1" required/>
                </div>

                <div class="form-group input-group">
                        <input type="number" class="form-control" id="price" placeholder="Enter Product Price" name="price" required />
                </div>

                <div class="form-group input-group">
                        <input type="number" class="form-control" id="stock" placeholder="Enter Product Stocks" name="stock" required />
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lock">Confirm Add Product</button>
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

<?php
    include '../connection/dbcon.php';
    if (isset($_POST['submit'])) {
    
        $pname = $_POST['pname'];
        $img = $_POST['img'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $insertquery = "INSERT INTO product(pname,img,price,stock) VALUES ('$pname','$img','$price','$stock')";

        $res = mysqli_query($con, $insertquery);

        if ($res) {
            ?>
                <script>
                    alert('Product Inserted Successfully');
                    location.replace("../Pages/product.php");
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert('Product Not Inserted');
                </script>
            <?php
        }
    }
?>