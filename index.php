<?php include "includes/config.php"; ?>


    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
  <?php include "includes/nav.php"; ?>


    <section class="toppart">

        <div class="container">

            <div class="row">

                <div class="featuredsec">

                    <div class="featuredimg">


                        <div class="featured-meta">
                            <div class="featured-meta-top">
                                <p>
                                    <span>
                                        <a href="#">Cat title 1</a>
                                    </span> /
                                    <span>22 May 2018 </span>
                                </p>
                            </div>

                            <a href="single.html">
                                <h2>FUSCE DAPIBUS, TELLUS AC CURSUS COMMODO, TORTOR </h2>
                            </a>

                            <div class="featured-meta-bottom">
                                <p>
                                    <span>By:
                                        <a href="#">Rahat Hossen</a>
                                    </span> /
                                    <span>1 Comment</span>
                                </p>
                            </div>

                        </div>
                    </div>


                </div>


                <div id="newsletter">

                    <div class="row">

                        <div class="col-md-4">

                            <h3>Subscribe Us For Latest News</h3>
                            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor Vivamus.</p>
                        </div>

                        <div class="col-md-8">

                            <form id="newsletter-form">
                                <div class="form-row align-items-center">
                                    <div class="col-sm-12 col-md-5 ">
                                            <div class="form-group">
                                        <label class="sr-only" for="inlineFormInputName">Name</label>
                                        <input type="text" class="form-control" id="inlineFormInputName" placeholder="Name">
                                    </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                            <div class="form-group">
                                        <label class="sr-only" for="inlineFormInputGroupUsername">Email</label>
                                        <div class="input-group">

                                            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email">
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2">
                                            <div class="form-group">
                                        <button type="submit" class="btn btn-light">Submit</button>
                                    </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>


            </div>

        </div>
    </section>


    <section id="blogsec">
        <div class="container">

            <div class="row">


                <?php




$query = "SELECT * FROM posts";

$select_all_posts_query = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_all_posts_query)){
   $post_id =  $row['post_id'];
   $post_title =  $row['post_title'];
   $post_author =  $row['post_author'];
   $post_date =  $row['post_date'];
   $post_image =  $row['post_image'];
   $post_content = substr($row['post_content'],0,200);




   ?>




                <article class="blog-post">
                    <div class="img-thumb">
                        <a href="#">

                            <img src="/asset/images/<?php echo $post_image; ?>" alt="">

                        </a>
                    </div>

                    <div class="blog-content">
                        
                            <h2><a href="post.php?post-id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h2>
                        
                        <p><?php echo $post_content; ?></p>

                        <div class="blog-meta">
                            <p>
                                <span> By:
                                    <a href="#"><?php echo $post_author; ?></a>
                                </span> /
                                <span><?php echo $post_date; ?></span>
                            </p>
                        </div>
                    </div>

                </article>


                <?php } ?>

               



            </div>

            <div class="row">

                <nav class="cedo-pagi" aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>

            </div>

        </div>

    </section>


    

<?php include "includes/footer-widget.php"; ?>

<?php include "includes/sub-footer.php"; ?>

<?php include "includes/footer.php"; ?>