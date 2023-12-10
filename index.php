<?php
    include('header.php');
	check_login();

	if(!check_verified())
	{
		header("Location: profile.php");
		die;
	}
?>
	
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
				</form>
	</div>
</body>
</html>