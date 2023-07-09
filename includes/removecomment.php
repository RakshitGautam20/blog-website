<?php
require 'db.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $postid=$_GET['post_id'];
    $query="DELETE FROM comments WHERE id=$id && post_id=$postid";
    mysqli_query($db,$query);
header('location:../NiceAdmin/index.php?managecomments');
}

?>