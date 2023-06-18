<?php
    include '../connection/dbcon.php';

    $id = $_GET['iddelete'];

    $deletequery = "DELETE from product where id=$id";

    $query = mysqli_query($con, $deletequery);

    if($query){
        ?>
            <script>
                alert("Product Deleted Successfully");
                location.replace("../Pages/product.php");
            </script>
        <?php
    }
    else{
        ?>
            <script>
                alert("Product Not Deleted");
            </script>
        <?php
    }
?>

