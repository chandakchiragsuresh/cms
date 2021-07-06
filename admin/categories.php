<?php
    include './includes/admin_header.php';
?>

    <div id="wrapper">

        <!-- Navigation -->

        <?php
            include './includes/admin_navigation.php';
        ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>



                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="posts.php">View All Posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=33">Add Posts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    
                    <li class="active">
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>





        <div id="page-wrapper">

            <div class="container-fluid">


            <?php 
                include './functions.php';
                insert_category();
            ?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Page
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            <form action="" method='post'>
                                <div class='form-group'>
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class='form-control' name='cat_title'>
                                </div>
                                <div class='form-group'>
                                    <input type="submit" class='btn btn-primary' name='submit' value='Add Category'>
                                </div>
                            </form>

                            <?php
                                    if(isset($_GET['edit'])){
                                        $the_cat_id = $_GET['edit'];
                                        $query = "SELECT * from category WHERE cat_id = $the_cat_id";
                                        $result = mysqli_query($connection,$query);
                                        $r = mysqli_fetch_assoc($result);
                                        if(!$result){
                                           
                                            die('ERROR'.mysqli_error($connection));
                                        }
                                        $var = $r['cat_title'];  
                                ?>

                            <form action="./categories.php" method='post'>
                                <div class='form-group'>
                                    <label for="cat-title">Edit Category</label>
                                    <input type="text" class='form-control' name='cat_title' value=<?php if(isset($_GET['edit'])){
                                        echo $var;
                                    }?>>

                                    <input type="hidden" name="cat_id" value=<?php echo $the_cat_id;?>>
                                </div>
                                <div class='form-group'>
                                    <input type="submit" class='btn btn-primary' name='edit' value='Edit Category'>
                                </div>
                            </form>


                            
                            <?php } ?>

                            <?php
                                if(isset($_POST['edit'])) {
                                    $cat_title = $_POST['cat_title'];
                                    $cat_id = $_POST['cat_id'];
                                    $query = "UPDATE category SET cat_title='$cat_title' where cat_id = $cat_id";
                                    $result = mysqli_query($connection, $query);
                                    if(!$result){
                                        die('MYSQLI ERROR'.mysqli_error($connection));
                                    }
                                }
                            ?>







                          
                            
                 







                            




                        </div>
                        <div class="col-xs-6">
                            <table class='table table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> Category Title</th>
                                        <th> Delete Title</th>
                                        <th> Edit Title</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    deleteCategory();
                                ?>
                                 




                            <?php
                                find_all_cat();
                            ?>
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php
    include 'includes/admin_footer.php';
?>