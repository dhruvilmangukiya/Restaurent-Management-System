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
        <h1 class="title-table">My Tables</h1>
        <div class="center-div">
            <div class="table-responsive">
                <table class="display-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>Person</th>
                            <th>Table</th>
                            <th>DateTime</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../connection/dbcon.php';

                            $selectquery = "SELECT * FROM `booktable`";
                            $query = mysqli_query($con, $selectquery);

                            while ($res = mysqli_fetch_array($query)) {   
                                ?>               
                                    <tr>
                                        <td><?php echo $res['id'] ?></td>
                                        <td><?php echo $res['name'] ?></td>
                                        <td><?php echo $res['mobile'] ?></td>
                                        <td><?php echo $res['person'] ?></td>
                                        <td><?php echo $res['table'] ?></td>
                                        <td><?php echo $res['datetime'] ?></td>
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


