<?php
include('header.php');
check_login();

if (!check_verified()) {
	header("Location: profile.php");
	die;
}
?>
<?php
$role_id = $_SESSION["USER"]->roleId;
if ($role_id == 2) {
?>
	<div class="row">
		<div class="col-md-4">
			<div class="card shadow">
				<div class="card-body text-start">
					<h5 class="card-title">All Users</h5>
					<p class="card-text"><i class="bi bi-people mr-3"></i>600</p>
					<a href="#" class="btn btn-primary">See Table</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card shadow">
				<div class="card-body text-start">
					<h5 class="card-title">All Blogs</h5>
					<p class="card-text"><i class="bi bi-people mr-3"></i>70</p>
					<a href="#" class="btn btn-primary">See Table</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card shadow">
				<div class="card-body text-start">
					<h5 class="card-title">Inbox message</h5>
					<p class="card-text"><i class="bi bi-people mr-3"></i>100+</p>
					<a href="#" class="btn btn-primary">See Table</a>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<h3>This is User dashbord</h3>
			</div>
		</div>
	</div>
<?php } ?>
<?php include('footer.php'); ?>