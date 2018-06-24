<?php include "includes/config.php"; ?>


    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
  <?php include "includes/nav.php"; ?>


    <section class="toppart single-page">

        <div class="container">

            <div class="row">


               <?php
            
            
            if(isset($_GET['post-id'])) {
               
               $the_post_id = $_GET['post-id'];
               
           }
           
       
           
             $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
           
             $select_all_posts_query = mysqli_query($connection,$query);
           
            while($row = mysqli_fetch_assoc($select_all_posts_query)){
                $post_id =  $row['post_id'];
                $post_title =  $row['post_title'];
                $post_author =  $row['post_author'];
                $post_date =  $row['post_date'];
                $post_image =  $row['post_image'];
                $post_content =  $row['post_content'];
           
           
           
                 
                ?>

                <div class="featuredsec">

                    <div style="background-image: url(../asset/images/<?php echo $post_image; ?>);" class="featuredimg">


                        <div class="featured-meta">
                            <div class="featured-meta-top">
                                <p>
                                    <span>
                                        <a href="#">Cat title 1</a>
                                    </span> /
                                    <span><?php echo $post_date; ?> </span>
                                </p>
                            </div>

                           
                                <h1>FUSCE DAPIBUS, TELLUS AC CURSUS COMMODO, TORTOR </h1>
                          

                            <div class="featured-meta-bottom">
                                <p>
                                    <span>By:
                                        <a href="#"><?php echo $post_author; ?></a>
                                    </span> /
                                    <span>1 Comment</span>
                                </p>
                            </div>

                        </div>
                    </div>


                </div>


            </div>

        </div>
    </section>


    <section id="blogsec">
        <div class="container">

            <div class="row">

                <div class="col-md-8">



                    

                    <article class="blog-single">

                       <?php echo $post_content; ?>


                    </article>


                   <?php include "includes/author-box.php"; ?>


<?php } ?>  
                   
                   <?php include "comment.php"; ?>
           




                </div>  <!-- col end -->

               
               <?php include "includes/sidebar.php"; ?>



        </div>

    </section>






<?php include "includes/sub-footer.php"; ?>

<?php include "includes/footer.php"; ?>