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

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Items</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody class="crud-operation">
    <tr>
      <th scope="row">1</th>
      <td>All Products</td>
      <td><div class="btn-box" style="width: 140px;background: #ffbe33;border-radius: 25px;padding: 6px 21px">
        <a href="../CRUD_OPERATION/addproduct.php" style="color: #fff;font-size: 14px;">
            ADD PRODUCT
        </a>
      </div></td>
    </tr>
  </tbody>
</table>

  <div class="main-div">
        <h1 class="title-table">ADDED PRODUCT</h1>
        <div class="center-div">
            <div class="table-responsive">
                <table class="display-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>pname</th>
                            <th>img</th>
                            <th>price</th>
                            <th>stock</th>
                            <th colspan="2">operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../connection/dbcon.php';

                            $selectquery = "select * from product";

                            $query = mysqli_query($con, $selectquery);

                            while ($res = mysqli_fetch_array($query)) {
                                
                        ?>               
                                <tr>
                                    <td><?php echo $res['id'] ?></td>
                                    <td><?php echo $res['pname'] ?></td>
                                    <td><?php echo $res['img'] ?></td>
                                    <td><?php echo $res['price'] ?></td>
                                    <td><?php echo $res['stock'] ?></td>
                                    <td><a href="../CRUD_OPERATION/update.php?id=<?php echo $res['id'] ?>" data-toggle="tooltip" data-placement="bottom" title="UPDATE"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                    <td><a href="../CRUD_OPERATION/delete.php?iddelete=<?php echo $res['id'] ?>" data-toggle="tooltip" data-placement="bottom" title="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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


  <script>
        $(document).ready(function(){
            $(`[data-toggle="tooltip"]`).tooltip();
        })
  </script>

</body>

</html>



