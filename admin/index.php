<?php
include "includes/admin-header.php";
?>


  <!-- Navigation-->
  <?php
include "includes/admin-nav.php"
?>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Welcome</li>
      </ol>


      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-file-alt"></i>
              </div>
              <div class="mr-5">
              
              <?php
                $query = "SELECT * FROM posts";
                $select_all_post = mysqli_query($connection, $query);
                $post_count = mysqli_num_rows($select_all_post);

                echo "$post_count POST";
              ?>
              
              
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="posts.php">
              <span class="float-left">View All Post</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">
                
              <?php
                $query = "SELECT * FROM categories";
                $select_all_categories = mysqli_query($connection, $query);
                $categories_count = mysqli_num_rows($select_all_categories);

                echo "$categories_count CATEGORIES";
              ?>
              
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="categories.php">
              <span class="float-left">View All Categories</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">
                
              <?php
                $query = "SELECT * FROM comments";
                $select_all_comments = mysqli_query($connection, $query);
                $comments_count = mysqli_num_rows($select_all_comments);

                echo "$comments_count COMMENTS";
              ?>
            
          </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="comments.php">
              <span class="float-left">View All Comments</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5">
                
              <?php
                $query = "SELECT * FROM users";
                $select_all_users = mysqli_query($connection, $query);
                $users_count = mysqli_num_rows($select_all_users);

                echo "$users_count USERS";
              ?>
              
          </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="users.php">
              <span class="float-left">View All Users</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>


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
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    

<?php
include "includes/admin-footer.php";
?>
