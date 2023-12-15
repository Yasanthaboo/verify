<?php
require "functions.php";

$pages = load_pages();

$role_id = $_SESSION["USER"]->roleId;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap 5 Icon CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

</head>

<body>

  <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">InsManager</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php if (check_login(false)) { ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Signup</a>
          </li>
          <?php if (check_login(false)) { ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          <?php } ?>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav> -->
  <section style="background-color: #eee;">



    <div class="container-fluid">
      <div class="row flex-nowrap">
        <div class="col-auto px-0">
          <div id="sidebar" class="collapse collapse-horizontal show border-end vh-100 shadow-sm">
            <div id="sidebar-nav" class="list-group border-0 rounded-0">
              <div class="p-2">
                <h4>InsManager</h4>
              </div>
              <form class="d-flex p-2">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
              </form>
              <ul class="list-group">
                <?php if ($pages) {

                  foreach ($pages as $page) {
                ?>
                    <li class="list-group-item"><a href="<?php echo $page->url; ?>" class="text-decoration-none text-black">
                        <?php echo $page->page; ?></a></li>
                  <?php }
                }
                if ($role_id == 0) {
                  ?>
                  <li class="list-group-item"> <a href="#" class="text-decoration-none text-black">Home</a> </li>
                  <li class="list-group-item"> <a href="#" class="text-decoration-none text-black">Blogs</a> </li>
                  <li class="list-group-item active" aria-current="true"> <a href="#" class="text-decoration-none text-white">Inbox</a> </li>
                  <li class="list-group-item"> <a href="#" class="text-decoration-none text-black">Settings</a> </li>
                <?php } ?>
                <?php if (check_login(false)) { ?>
                  <li class="list-group-item"> <a href="verify/logout.php" class="text-decoration-none text-black">Logout</a> </li>
                <?php } ?>

              </ul>
            </div>
          </div>
        </div>
        <div class="col ps-md-2 pt-2">
          <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none"><i class="bi bi-list"></i></a>
          <div class="page-header pt-3">
            <h2></h2>
          </div>
          <hr>
          <!-- 
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  </section> -->