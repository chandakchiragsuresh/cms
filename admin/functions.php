<?php
     
    function confirm($result, $connection){
        if(!$result){
            die('MYSQLI ERROR'.mysqli_error($connection));
        }
    }
    
    function insert_category(){
        $connection = mysqli_connect('localhost', 'root', '', 'cms');
        if(isset($_POST['submit'])) {
            $cat_title = $_POST['cat_title'];
            if($cat_title==''){
                echo 'Field is Empty please fill appropriate things....';
            }
            else{
                $query = "INSERT INTO category(cat_title)";
                $query .= "VALUE ('{$cat_title}')";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                    die('QUERY FAILED'. mysqli_error($connection));
                }
            }
        }
    }
    function find_all_cat(){
        $connection = mysqli_connect('localhost', 'root', '', 'cms');
        $query = 'SELECT * FROM category';
        $select_all_post_query =  mysqli_query($connection,$query);
        while($r = mysqli_fetch_assoc($select_all_post_query)){
            $cat_id = $r['cat_id'];
            $cat_title = $r['cat_title'];
        
            echo "<tr>";
            echo "<td>$cat_id</td>";

            echo "<td>$cat_title</td>";
            echo  "<td> <a href='./categories.php?delete={$cat_id}'>Delete</a></td>";
            echo  "<td> <a href='./categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "</tr>";
        }
    }

    function deleteCategory(){
        $connection = mysqli_connect('localhost', 'root', '', 'cms');
        if(isset($_GET['delete'])){
            $the_cat_id = $_GET['delete'];
            $query = "DELETE FROM category WHERE cat_id = '$the_cat_id'";
            $result = mysqli_query($connection,$query);
            if(!$result){
                die('ERROR'.mysqli_error($connection));
            }
            header('location:./categories.php');
        }
    }
?>