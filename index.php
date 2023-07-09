<?php
require('includes/db.php');
include('includes/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <title>Blog</title>
</head>

<body>
  <?php include_once('includes/navbar.php'); ?>
  <div>
    <div class="container m-auto mt-3 row">

      <div class="col-8">
        <?php
        if(isset($_GET['search'])){
          $keyword=$_GET['search'];
          $postQuery = "select * from posts  where title like '%$keyword%' order by id desc";

        }
       
        else {
          $postQuery = "select * from posts order by id desc";
        }
        
        $runPQ = mysqli_query($db, $postQuery);
        while ($post = mysqli_fetch_assoc($runPQ)) {
        ?>
          <div class="card mb-3" style="max-width: 800px;">
          <a href="post.php?id=<?=$post['id'] ?>" style="text-decoration:none; color:black">
             <div class="row g-0">
              <div class="col-md-5" style="background-image: url('images/<?=getPostThumb($db,$post['id'])?>');background-size: cover">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title"><?= $post['title'] ?></h5>
                  <p class="card-text text-truncate"><?= $post['content'] ?></p>
                  <p class="card-text"><small class="text-muted">posted on <?= $post['created_at'] ?> </small></p>
                </div>
              </div>
          </div>
        </a>
      </div>
    <?php

        }
    ?>




    </div>
    <?php include_once('includes/sidebar.php'); ?>
  </div>

  

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>