<div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>


            <form action="search.php" method="post">
            <div class="card-body">
              <div class="input-group">
                <input name="search" type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button name="submit" class="btn btn-secondary" type="submit">Go!</button>
                </span>
              </div>
            </div>
            </form>

          </div>


          <!-- Login Widget -->
          <div class="card my-4">

            <h5 class="card-header">Login</h5>

            <form action="includes/login.php" method="post">
            <div class="card-body">
              <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Username">
              </div>
              <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password">
              </div>


                <button name="login" class="btn btn-secondary" type="submit">Login</button>

            </div>
            </form>

          </div>




          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">

                    <?php


                      $query = "SELECT * FROM categories ";

            $select_cat_title = mysqli_query ($connection, $query);

      while ($row = mysqli_fetch_assoc ($select_cat_title)) {

          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];

          echo "<li><a href='category.php?cat-id=$cat_id'>$cat_title</a></li>";

      }


                    ?>


                  </ul>
                </div>

              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>
