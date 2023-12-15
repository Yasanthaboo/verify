<?php
include('header.php');
check_login();

if (!check_verified()) {
	header("Location: profile.php");
	die;
}
?>
<!-- 
<form class="needs-validation" novalidate method="post">
	<section style="background-color: #eee;">
		<div class="container py-5">
			<div class="row">
				<div class="col">
					<nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
						<ol class="breadcrumb mb-0">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
						</ol>
					</nav>
				</div>
			</div>

	</section>
</form> -->
<?php
$role_id = $_SESSION["USER"]->roleId;
print($role_id);
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
	<div class="mt-5">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">First</th>
					<th scope="col">Last</th>
					<th scope="col">Handle</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
				</tr>
				<tr>
					<th scope="row">2</th>
					<td>Jacob</td>
					<td>Thornton</td>
					<td>@fat</td>
				</tr>
				<tr>
					<th scope="row">3</th>
					<td colspan="2">Larry the Bird</td>
					<td>@twitter</td>
				</tr>
			</tbody>
		</table>
	<?php } else { ?>
		<h3>This is User dashbord</h3>
	<?php } ?>
	<!-- </div>
</div>
</body>

</html> -->
	<?php include('footer.php'); ?>