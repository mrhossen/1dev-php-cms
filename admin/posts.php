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
                      
                case 'add-post';
                include "includes/add-post.php"; 
                break;
                      
                case 'edit-post';
                include "includes/edit-post.php"; 
                break;
                      
                default:
                include "includes/view-all-post.php";
                break;
                      
              }

            ?>
            
            <?php deletePost(); ?>
      
         
            
          
          
      
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
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