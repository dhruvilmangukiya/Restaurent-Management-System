<?php 
        if(!isset($_SESSION['username'])){
            ?>
                <script>
                    alert("You Have Not Login Please Login...");
                    location.replace("../Pages/login.php");
                </script>
            <?php
        }
    ?>