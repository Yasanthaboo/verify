<?php
include('../../header.php');
include('role_service.php');
check_login();

$errors = array();
if (!check_verified()) {
  header("Location: ../../profile.php");
  die;
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $action  = $_POST["btn_action"];

  if ($action == 'add') {
    $errors = Add_Role($_POST);
  } else if ($action == 'remove') {

    if (isset($_POST['roles'])) {
      $selectedRoles = implode(',', $_POST['roles']);
    } else {
      $errors = "not available";
    }
    $errors = Remove_Role($selectedRoles);
  }
}

$roles = Get_Role();
?>
<div>
  <div>
    <?php if (count($errors) > 0) : ?>
      <div class="alert alert-danger" role="alert">

        <?php foreach ($errors as $error) : ?>
          <?= $error ?> <br>
        <?php endforeach; ?>
        </ div>
      <?php endif; ?>
      </div>
      <form class="needs-validation" novalidate method="post">
        <div class="container py-5">
          <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Role</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Role Name</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="validationCustom01" name="rolename" required placeholder="Role">
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-9">
                    <button class="btn btn-primary" type="submit" name="btn_action" value="add">Add</button>
                    <button class="btn btn-danger" type="submit" name="btn_action" value="remove">Remove</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="container col-md-6">
            </div>
            <?php if ($roles) { ?>
              <ul class="list-group">
                <?php foreach ($roles as $key => $value) {
                ?>

                  <li class="list-group-item">
                    <input class="form-check-input me-1" name="roles[]" type="checkbox" value="<?php echo $value->Id; ?>" id="checkbox_<?php echo $value->Id; ?>">
                    <label class="form-check-label" for="firstCheckbox"><?php echo $value->rolename; ?></label>

                  </li>
                <?php } ?>
              </ul>
            <?php } ?>
      </form>
      <?php include('../../footer.php') ?>