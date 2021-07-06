
<?php
    include './functions.php';
?>

<?php


$connection = mysqli_connect('localhost', 'root', '', 'cms');
    if(isset($_POST['create_post'])){
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 4;

        move_uploaded_file($post_image_temp,"../images/{$post_image}");

        $query = 'INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image,
        post_content, post_tags, post_comment_count, post_status)';
        $query .= "VALUES('$post_category_id','$post_title', '$post_author', now(), '$post_image',
        '$post_content', '$post_tags', '$post_comment_count', '$post_status')";
        $result = mysqli_query($connection, $query);
        confirm($result, $connection);

    }
?>



<form action='' method='post' enctype='multipart/form-data'>
    <div class='form-group'>
        <label for="title"> Post Title</label>
        <input class='form-control' type="text" name="title" id="">
    </div>
    <div class='form-group'>
        <label for="post_category"> Post Category</label>
        <select class='form-group' name="post_category_id">
        <?php
        $connection = mysqli_connect('localhost', 'root', '', 'cms');
        $query = 'SELECT * FROM category';
        $select_all_post_query =  mysqli_query($connection,$query);
        while($r = mysqli_fetch_assoc($select_all_post_query)){
            $cat_title = $r['cat_title'];
            echo "<option>$cat_title</option>";
        }
        ?>
        </select>
    </div>
    <div class='form-group'>
        <label for="title"> Post Author</label>
        <input class='form-control' type="text" name="author" id="">
    </div>
    <div class='form-group'>
        <label for="title"> Post Status</label>
        <input class='form-control' type="text" name="post_status" id="">
    </div>
    <div class='form-group'>
        <label for="title"> Post Image</label>
        <input class='form-control' type="file" name="image" id="">
    </div>
    <div class='form-group'>
        <label for="title"> Post Tags</label>
        <input class='form-control' type="text" name="post_tags" id="">
    </div>
    <div class='form-group'>
        <label for="title"> Post Content</label>
        <input class='form-control'  name="post_content" id="" cols='30' rows='10'>
    </div>
    <div class='form-group'>
        <input class='btn btn-primary' type="submit" name="create_post" id="">
    </div>



  
</form>