
<table class='table table-bordered table-hover'>

    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Date</th>
            <th>Delete<th>
        </tr>
    </thead>

    <tbody>
        <?php
            $query = 'SELECT * FROM posts';
            $result = mysqli_query($connection, $query);
            while($r = mysqli_fetch_assoc($result)){
                $id = $r['post_id'];
                $author = $r['post_author'];
                $title = $r['post_title'];
                $category = $r['post_category_id'];
                $status = $r['post_status'];
                $image = $r['post_image'];
                $tags = $r['post_tags'];
                $date = $r['post_date'];
            
        ?> 
        <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $author ?></td>
        <td><?php echo $title ?></td>
        <td><?php echo $category ?></td>
        <td><?php echo $status ?></td>
        <td> <img class = 'img-responsive' src="https://i.ytimg.com/vi/9FFyaPvJ4Fk/maxresdefault.jpg" alt="image"></td> 
        <td><?php echo $tags ?></td>
        <td><?php echo $date ?></td>
        <td> <a href='./posts.php?id=<?php echo $id?>'>Delete</a> </td>
        <td> <a href="./posts.php?id=<?php echo $id?>&source=edit_post">Edit</a> </td>
        </tr>

        <?php
            }
        ?>



        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = "DELETE FROM posts WHERE post_id = '$id'";
                $result = mysqli_query($connection, $query);
                if(!$result){
                    die('MYSQLI ERROR'.mysqli_error($connection));
                }
            }
        ?>
        <img href='mac.jpg' alt='image' width='500px'>
    </tbody>
    
</table>
