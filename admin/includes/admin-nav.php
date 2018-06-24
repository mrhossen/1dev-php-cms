<nav class="navbar navbar-expand-lg navbar-light cdos-nav bg-light fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><i class="fas fa-bullseye fa-2x color-purple"></i> 1DEV CMS</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">


      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-columns"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file-alt"></i>
            <span class="nav-link-text">Posts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="posts.php">All Post</a>
            </li>
            <li>
              <a href="posts.php?source=add-post">Add Post</a>
            </li>
             <li>
              <a href="categories.php">Categories</a>
            </li>
            <li>
              <a href="tags.php">Tags</a>
            </li>
          </ul>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="comments.php">
            <i class="fa fa-fw fa-comment"></i>
            <span class="nav-link-text">Comments</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">User</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
           <li>
              <a href="users.php">All User</a>
            </li>
            <li>
              <a href="users.php?source=add-user">Add User</a>
            </li>
            <li>
              <a href="user-profile.php">Profile</a>
            </li>

          </ul>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-cogs"></i>
            <span class="nav-link-text">Settings</span>
          </a>
        </li>


      </ul>


      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>


      <ul class="navbar-nav ml-auto">

        

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-plus fa-lg"></i>
            <span class="d-lg-none">Add New
            </span>
            
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
          <a class="dropdown-item large" href="posts.php?source=add-post">Add New Post</a>
            <div class="dropdown-divider"></div>

            <a class="dropdown-item large" href="users.php?source=add-user">Add New User</a>
          </div>
        </li>

<li class="nav-item"><a href="/" target="_blank" class="nav-link frontend-btn">Frontend</a></li>

        <li class="nav-item"><a href="user-profile.php" class="nav-link">Welcome <?php echo $_SESSION['username']; ?></a></li>




        <li class="nav-item">
          <a class="nav-link" href="../includes/logout.php">
          <i class="fas fa-sign-in-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>
