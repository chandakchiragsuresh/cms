<?php
  
    $connection = mysqli_connect('localhost', 'root', '', 'cms');
    $query='';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM posts WHERE post_id = '{$id}'";
        
    }
    $result = mysqli_query($connection, $query);
    
    
    while($r = mysqli_fetch_assoc($result)){
        $post_title = $r['post_title'];
        $post_author = $r['post_author'];
        $post_category_id = $r['post_category_id'];
        $post_status = $r['post_status'];
        $post_image = $r['post_image'];
        $post_tags = $r['post_tags'];
        $post_content = $r['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 4;
    
?>



<form action='' method='post' enctype='multipart/form-data'>
        
    <input type="hidden" value="<?php echo $id; ?>" name="id" />
    <div class='form-group'>
        <label for="title"> Post Title</label>
        <input class='form-control' value = '<?php echo  $post_title;?>' type="text" name="title" id="">
    </div>
    <div class='form-group'>
        <label for="post_category"> Post Category Id</label>
        <input class='form-control' value = '<?php echo $post_category_id?>' type="text" name="post_category_id" id="">
    </div>
    <div class='form-group'>
        <label for="title"> Post Author</label>
        <input class='form-control' value = "<?php echo $post_author; ?>" type="text" name="author" id="">
    </div>
    <div class='form-group'>
        <label for="title"> Post Status</label>
        <input class='form-control' type="text" value = '<?php echo $post_status; ?>' name="post_status" id="">
    </div>
    <div class='form-group'>
        <label for="title"> Post Image</label>
        <input class='form-control' type="file" name="image" id="">
        <img width='100' height='50' src="../images/<?php echo $post_image; ?>" alt="">
    </div>
    <div class='form-group'>
        <label for="title"> Post Tags</label>
        <input class='form-control' type="text" name="post_tags" id="" value='<?php echo $post_tags ?>'>
    </div>
    <div class='form-group'>
        <label for="title"> Post Content</label>
        <input class='form-control'  name="post_content" id="" cols='30' rows='10'  value = '<?php echo $post_content?>'>
    </div>
    <div class='form-group'>
        <input class='btn btn-primary' type="submit" name="edit_post" id="">
    </div>
</form>

<?php } ?>



<?php

include './functions.php' ;
$connection = mysqli_connect('localhost', 'root', '', 'cms');
    if(isset($_POST['edit_post'])){
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $id = $_POST['id'];
        $post_comment_count = 4;

        move_uploaded_file($post_image_temp,"../images/{$post_image}");
        $query = "UPDATE posts SET post_category_id = '$post_category_id', post_title='$post_title',
        post_author = '$post_author',post_content='$post_content',post_tags='$post_tags' where post_id = $id";
        // $query = 'INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image,
        // post_content, post_tags, post_comment_count, post_status)';
        // $query .= "VALUES($post_category_id,'$post_title', '$post_author', now(), '$post_image',
        // '$post_content', '$post_tags', '$post_comment_count', '$post_status')";
        $result = mysqli_query($connection, $query);
        confirm($result, $connection);

    }
?>