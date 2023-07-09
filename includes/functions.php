<?php
function getCategory($db, $id){
    $query="select * from category where id=$id";
    $run=mysqli_query($db,$query);
    $data=mysqli_fetch_assoc($run);
    return $data['name'];
}
function getAllCategory($db){
    $query="select * from category";
    $run=mysqli_query($db,$query);
    $data=array();
    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}
function getImagesByPost($db, $post_id){
    $query="select * from images where post_id=$post_id";
    $run=mysqli_query($db,$query);
    $data=array();
    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}
function getComments($db,$post_id){
    $query="select * from comments where post_id=$post_id";
    $run=mysqli_query($db,$query);
    $data=array();
    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}
function getAllComments($db){
    $query="select * from comments ";
    $run=mysqli_query($db,$query);
    $data=array();
    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}
function getSubMenu($db, $menu_id){
    $query="select * from submenu where parent_menu_id=$menu_id";
    $run=mysqli_query($db,$query);
    $data=array();
    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}
function getSubMenuNo($db, $menu_id){
    $query="select * from submenu where parent_menu_id=$menu_id";
    $run=mysqli_query($db,$query);
    return mysqli_num_rows($run);
}
function getAdminInfo($db, $email){
    $query="select * from admin where email='$email'";
    $run=mysqli_query($db,$query);
    $data=mysqli_fetch_assoc($run);
    return $data;
}
function getAllPost($db){
    $query="SELECT * FROM posts ORDER BY id DESC";
    $run=mysqli_query($db,$query);
    $data = array();

    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data; 
}
function getPostThumb($db,$id){
    $query="SELECT * FROM images WHERE post_id=$id";
    $run=mysqli_query($db,$query);
    $data = mysqli_fetch_assoc($run);
    return $data['image'];
}
?>