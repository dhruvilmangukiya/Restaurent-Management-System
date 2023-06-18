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

  <div class="main-div">
        <h1 class="title-table">My Orders</h1>
        <div class="center-div">
            <div class="table-responsive">
                <table class="display-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>pname</th>
                            <th>quantity</th>
                            <th>price</th>
                            <th>mobile</th>
                            <th>address</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../connection/dbcon.php';

                            $selectquery = "SELECT * FROM `order`";
                            $query = mysqli_query($con, $selectquery);

                            while ($res = mysqli_fetch_array($query)) {   
                                ?>               
                                    <tr>
                                        <td><?php echo $res['id'] ?></td>
                                        <td><?php echo $res['pname'] ?></td>
                                        <td><?php echo $res['quantity'] ?></td>
                                        <td><?php echo $res['price'] ?></td>
                                        <td><?php echo $res['mobile'] ?></td>
                                        <td><?php echo $res['address'] ?></td>
                                        <td class="email-style">Confirmed</td>
                                    </tr>
                                <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>


  <!-- footer section -->
    <?php include '../Included_Folder/footer.php' ?>
  <!-- footer section -->

  <?php include '../Included_Folder/script.php' ?>

</body>

</html>