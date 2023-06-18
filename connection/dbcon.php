<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = 'Food';

    $con = mysqli_connect($server,$username,$password,$db);

    if(!$con){
        ?>
        <script>
            alert('No Connection');
        </script>
        <?php
    }
?>