<?php
    include "./includes/db.php";
    include "./includes/header.php";
    
?>

<?php
   include "./includes/navigation.php"; 
?>
    <!-- Navigation -->
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php

                   
                    if(isset($_POST['submit'])){
                        $search = $_POST['search'];
                        $query = "SELECT * FROM posts where post_tags LIKE '%$search%'";
                        $search_query = mysqli_query($connection, $query);

                        if(!$search_query){
                            die("Query failed".mysqli_error($connection));
                        }
                        $count = mysqli_num_rows($search_query);
                        if($count == 0) {
                            echo '<h1>No Result</h1>';
                        }
                        else{
                            echo '<h1>Some Result</h1>';
                        }


                    }

                    $select_all_post_query =  mysqli_query($connection,$query);

                    while($r = mysqli_fetch_assoc($select_all_post_query)){
                        $post_title = $r['post_title'];
                        $post_author = $r['post_author'];
                        $post_date = $r['post_date'];
                        $post_image = $r['post_image'];
                        $post_content = $r['post_content'];
                        ?>

                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo 'Posted on'. ' ' .$post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="./images/<?php echo $post_image ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
                        <?php
                    }
                        ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php
                include "./includes/sidebar.php";
            ?>
        <!-- /.row -->
        </div>
        <!-- Side Widget Well -->
                </div>
                </div>
                <!-- /.row -->

                <hr>
                <?php
                    include "./includes/footer.php";
                ?>
          </div>