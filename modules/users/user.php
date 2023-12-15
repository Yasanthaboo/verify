<?php
include('../../header.php');
include('user_service.php');
include('../../modules/roles/role_service.php');

check_login();

$users = Get_users();
$roles = Get_Role();
$errors = array();
if (!check_verified()) {
    header("Location: ../../profile.php");
    die;
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $action  = $_POST["btn_action"];
    $action = substr($action, 0, strpos($action, "_"));

    if ($action == 'Update') {
        $errors = Update_User($_POST);
        if (count($errors) == 0) {
            $users = Get_users();
        }
    } else if ($action == 'Remove') {

        $errors = Remove_User($_POST);
    }
}

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
                    <div class="col-lg-12">
                        <?php if ($users) { ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone No</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $value) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $value->Id ?></th>
                                            <td><?php echo $value->firstname ?></td>
                                            <td><?php echo $value->lastname ?></td>
                                            <td><?php echo $value->email ?></td>
                                            <td><?php echo $value->phoneno ?></td>
                                            <td> <input class="form-check-input me-1" style="margin-left:5px !important" name="active_<?php echo $value->Id ?>" type="checkbox" <?php if ($value->active) {
                                                                                                                                                                                    echo "checked = 'checked'";
                                                                                                                                                                                } ?> value="<?php echo $value->Id; ?>" id="checkbox_<?php echo $value->Id; ?>"></td>
                                            <td>
                                                <select name="role_<?php echo $value->Id ?>" id="role_<?php echo $value->firstname; ?>">
                                                    <?php foreach ($roles as $key => $role_value) { ?>
                                                        <option value="<?php echo $role_value->Id; ?>" <?php if ($value->roleId == $role_value->Id) {
                                                                                                            echo "selected='selected'";
                                                                                                        } ?>><?php echo $role_value->rolename; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td colspan="2"><button class="btn btn-success" type="submit" name="btn_action" value="Update_<?php echo $value->Id ?>">Update</button> </td>
                                            <td><button class="btn btn-danger" type="submit" name="btn_action" value="Remove_<?php echo $value->Id ?>">Remove</button></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
            </form>
            <?php include('../../footer.php'); ?>