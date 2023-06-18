<?php 

    session_start();

    session_destroy();

    ?>
        <script>
            alert('Logout Successfully');
            location.replace("../Pages/login.php");
        </script>
    <?php
?>