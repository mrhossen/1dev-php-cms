<?php include "includes/admin-header.php"; ?>

  <!-- Navigation-->
  <?php include "includes/admin-nav.php"; ?>




  <div class="content-wrapper">
    <div class="container-fluid">
     


           <?php

              if (isset($_GET['source'])) {

                  $source = $_GET['source'];

              } else {
                  $source = '';
              }

              switch($source) {

                case 'add-user';
                include "includes/add-user.php";
                break;

                case 'edit-user';
                include "includes/edit-user.php";
                break;

                default:
                include "includes/view-all-users.php";
                break;

              }

            ?>


    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>CDOS CMS</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>




<?php
include "includes/admin-footer.php";
?>
