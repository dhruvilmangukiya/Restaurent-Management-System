<!-- jQery -->
<script src="../js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="../Online_Files_All/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<!-- bootstrap js -->
<script src="../js/bootstrap.js"></script>
<!-- owl slider -->
<script src="../Online_Files_All/owl.carousel.min.js">
</script>
<!-- isotope js -->
<script src="../Online_Files_All/isotope.pkgd.min.js"></script>
<!-- nice select -->
<script src="../Online_Files_All/jquery.nice-select.min.js"></script>
<!-- custom js -->
<script src="../js/custom.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
<!-- End Google Map -->
<!-- Sweetalert -->
<script src="../Online_Files_All/sweetalert.min.js"></script>
<!-- End Sweet Alert -->

<script src="../js/signup.js"></script>
<script src="../js/addproducts.js"></script>
<script src="../js/booknow.js"></script>

<?php
  if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
      <script>
        swal({
          title: "<?php echo $_SESSION['status'] ?>",
          icon: "<?php echo $_SESSION['status_code'] ?>",
          button: "OK",
        }).then((isConfirm) => {
          if (isConfirm) {
            if ("<?php echo $_SESSION['status_code'] ?>" === "success") {
              location.replace("dashboard.php");
            }
          }
        })
      </script>
    <?php
    unset($_SESSION['status']);
  }
?>