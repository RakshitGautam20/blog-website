<?php
require('db.php');
if(isset($_POST['addcomment'])){
   $pname=$_POST['comment_content'];
   $pcontent=$_POST['comment_name'];
   $cid=$_POST['id'];
   $query="INSERT INTO comments (comment,name,post_id) VALUES('$pname','$pcontent','$cid')";
   $run=mysqli_query($db,$query);




header("location:../post.php?id=$cid");


}
?>