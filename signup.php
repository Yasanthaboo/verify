<?php

include('header.php');

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $errors = signup($_POST);

  if (count($errors) == 0) {
    header("Location: login.php");
    die;
  }
}

?>

<?php if (count($errors) > 0) : ?>
  <div class="alert alert-danger" role="alert">

    <?php foreach ($errors as $error) : ?>
      <?= $error ?> <br>
    <?php endforeach; ?>
    </ div>
  <?php endif; ?>

  <form class="needs-validation" novalidate method="post">

    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">signup</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">First Name</p>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="validationCustom01" name="firstname" required placeholder="First Name">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Last Name</p>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="lastname" id="validationCustom02" placeholder="Last Name" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="email" id="validationCustomUsername" placeholder="Email" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="phoneno" placeholder="Phone No" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please provide a valid Phone no.
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Password</p>
              </div>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="password" placeholder="Password" id="validationCustom04" required>
                <div class="invalid-feedback">
                  Please select a valid Password.
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Confirmation Password</p>
              </div>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="password2" placeholder="Password" id="validationCustom05" required>
                <div class="invalid-feedback">
                  Please select a valid Password.
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">

              </div>
              <div class="col-sm-9">
                <button class="btn btn-primary" type="submit">Signup</button>
              </div>
            </div>
          </div>
        </div>

  </form>

  <?php include('footer.php'); ?>