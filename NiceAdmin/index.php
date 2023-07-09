<?php
require('../includes/db.php');
require('../includes/functions.php');
// if(!isset($_SESSION['isUserLoggedIn']) ){
//   header('Location:index.php');
// }
$admin = getAdminInfo($db, $_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Blog</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $admin['full_name'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $admin['full_name'] ?></h6>

            </li>
            <li>
              <hr class="dropdown-divider">
</li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="../includes/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Add Post</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="index.php?managepost">
          <i class="bi bi-grid"></i>
          <span>Manage Post</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="index.php?managecomments">
          <i class="bi bi-grid"></i>
          <span>Manage Comments</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="index.php?managecategory">
          <i class="bi bi-grid"></i>
          <span>Manage Category</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <!-- End Dashboard Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">


    <?php
    if (isset($_GET['managecategory'])) {
    ?>
      
      <form role="form" method="post" action="../includes/addct.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Add New Category</label>
          <br>
          
          <input type="text" name="category-name" class="form-control" id="exampleInputEmail3" placeholder="Enter category name..">
        </div>
         


        <button type="submit" name="addct" class="btn btn-primary">Add</button>
      </form>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">


            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>#</th>
                  <th>Category Name</th>
                  <th>Action</th>

                </tr>

                <?php
                $categories = getAllCategory($db);
                $count = 1;
                foreach ($categories as $ct) {
                ?>
                  <tr>
                    <td><?= $count ?></td>
                    <td><?= $ct['name'] ?></td>

                    <td>
                      <div class="btn-group">

                        <a class="btn btn-danger" href="../includes/removect.php?id=<?= $ct['id'] ?>">Remove <i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php
                  $count++;
                }
                ?>




              </tbody>
            </table>
          </section>
        </div>
      </div>
    <?php
    } 
    else if(isset($_GET['managecomments'])){
      ?>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Posts
            </header>
  
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Comment</th>
                  <th>Post_id</th>
                  <th>Action</th>
  
  
                </tr>
  
                <?php
                $comments = getAllComments($db);
                $count = 1;
                foreach ($comments as $comment) {
                ?>
                  <tr>
                    <td><?= $count ?></td>
                    <td><?= $comment['name'] ?></td>
                    <td><?= $comment['comment']?></td>
  
                    <td><?= $comment['post_id']?></td>
  
  
                    <td>
                      <div class="btn-group">
  
                        <a class="btn btn-danger" href="../includes/removecomment.php?post_id=<?= $comment['post_id'] ?>&id=<?=$comment['id']?>">Remove <i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php
                  $count++;
                }
                ?>
  
  
  
  
              </tbody>
            </table>
          </section>
        </div>
      </div>
  
    <?php
     }
   else if(isset($_GET['managepost'])){
    ?>
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Posts
          </header>

          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>#</th>
                <th>Post Title</th>
                <th>Post Category</th>
                <th>Post Date</th>
                <th>Action</th>


              </tr>

              <?php
              $posts = getAllPost($db);
              $count = 1;
              foreach ($posts as $post) {
              ?>
                <tr>
                  <td><?= $count ?></td>
                  <td><?= $post['title'] ?></td>
                  <td><?= getCategory($db, $post['category_id']) ?></td>

                  <td><?= date('F jS, Y', strtotime($post['created_at'])) ?></td>


                  <td>
                    <div class="btn-group">

                      <a class="btn btn-danger" href="../includes/removepost.php?id=<?= $post['id'] ?>">Remove <i class="icon_close_alt2"></i></a>
                    </div>
                  </td>
                </tr>
              <?php
                $count++;
              }
              ?>




            </tbody>
          </table>
        </section>
      </div>
    </div>

  <?php
   }

    else {
    ?>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Post</h5>
          <div class="form">

            <form action="../includes/addpost.php" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-12">
                  <label>Post Title</label>
                  <input type="text" class="form-control" name="post_title" >
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <div class="col-sm-12">
                    <label>Select Post Category</label>
                    <select class="form-control" name="post_category">
                      <?php
                      $categories = getAllCategory($db);
                      foreach ($categories as $ct) {
                      ?>
                        <option value="<?= $ct['id'] ?>"><?= $ct['name'] ?></option>
                      <?php
                      }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-6">
                    <label>Upload Photos (max 5)</label>
                    <input type="file" class="form-control" name="post_image[]" accept="image/*" multiple >
                  </div>
                </div>
                <div class="form-group">

                  <div class="col-sm-12">
                    <label>Post Content</label>
                    <textarea class="form-control ckeditor" name="post_content" rows="6" ></textarea>
                  </div>
                  <br>
                  <input type="submit" name="addpost" class="btn btn-primary w-6" value="ADD-POST">
                </div>
              </div>
            </form>

          </div>
          <br>

       

        </div>
      </div>
    <?php
    }
    ?>



  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>