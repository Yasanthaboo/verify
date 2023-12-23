<?php

require "functions.php";

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $errors = login($_POST);

  if (count($errors) == 0) {
    header("Location: profile.php");
    die;
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
  <div>
    <div class="alert alert-danger" role="alert">
      <?php if (count($errors) > 0) : ?>
        <?php foreach ($errors as $error) : ?>
          <?= $error ?> <br>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
    <form method="post">
      <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                  <h3 class="mb-5">Sign in</h3>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="typeEmailX-2">Email</label>
                    <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="typePasswordX-2">Password</label>
                    <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                  </div>

                  <!-- Checkbox -->
                  <div class="form-check d-flex justify-content-start mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                  </div>

                  <button class="btn btn-primary btn-lg btn-block" type="submit" value="Login">Login</button>

                  <hr class="my-4">
                  <div class="form-check d-flex justify-content-start mb-3">
                    <a class="nav-link" href="signup.php">Signup</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
    <!-- <form method="post">
			<input type="email" name="email" placeholder="Email"><br>
			<input type="password" name="password" placeholder="Password"><br>
			<br>
			<input type="submit" value="Login">
		</form> -->
</body>

</html>