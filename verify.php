<?php

require "mail.php";
include('header.php');
check_login();

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "GET" && !check_verified()) {

	$query = "select * from verify where email = :email";
	$vars = array();
	$vars['email'] = $_SESSION['USER']->email;

	$verification = database_run($query, $vars);
	//send email
	$vars['code'] =  rand(10000, 99999);

	//save to database
	$vars['expires'] = (time() + (60 * 10));
	$vars['email'] = $_SESSION['USER']->email;
	$query = "";
	if (!$verification) {
		$query = "insert into verify (code,expires,email) values (:code,:expires,:email)";
	} else {
		$query = "Update verify set code = :code,expires=:expires  Where email =:email";
	}

	database_run($query, $vars);
	$message = "your code is " . $vars['code'];

	$message = "<!DOCTYPE html>
		<html>
		
		<head>
			<title></title>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<meta http-equiv='X-UA-Compatible' content='IE=edge' />
			<style type='text/css'>
				@media screen {
					@font-face {
						font-family: 'Lato';
						font-style: normal;
						font-weight: 400;
						src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
					}
		
					@font-face {
						font-family: 'Lato';
						font-style: normal;
						font-weight: 700;
						src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
					}
		
					@font-face {
						font-family: 'Lato';
						font-style: italic;
						font-weight: 400;
						src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
					}
		
					@font-face {
						font-family: 'Lato';
						font-style: italic;
						font-weight: 700;
						src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
					}
				}
		
				/* CLIENT-SPECIFIC STYLES */
				body,
				table,
				td,
				a {
					-webkit-text-size-adjust: 100%;
					-ms-text-size-adjust: 100%;
				}
		
				table,
				td {
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
				}
		
				img {
					-ms-interpolation-mode: bicubic;
				}
		
				/* RESET STYLES */
				img {
					border: 0;
					height: auto;
					line-height: 100%;
					outline: none;
					text-decoration: none;
				}
		
				table {
					border-collapse: collapse !important;
				}
		
				body {
					height: 100% !important;
					margin: 0 !important;
					padding: 0 !important;
					width: 100% !important;
				}
		
				/* iOS BLUE LINKS */
				a[x-apple-data-detectors] {
					color: inherit !important;
					text-decoration: none !important;
					font-size: inherit !important;
					font-family: inherit !important;
					font-weight: inherit !important;
					line-height: inherit !important;
				}
		
				/* MOBILE STYLES */
				@media screen and (max-width:600px) {
					h1 {
						font-size: 32px !important;
						line-height: 32px !important;
					}
				}
		
				/* ANDROID CENTER FIX */
				div[style*='margin: 16px 0;'] {
					margin: 0 !important;
				}
			</style>
		</head>
		
		<body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
			<!-- HIDDEN PREHEADER TEXT -->
			<div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'> We're thrilled to have you here! Get ready to dive into your new account.
			</div>
			<table border='0' cellpadding='0' cellspacing='0' width='100%'>
				<!-- LOGO -->
				<tr>
					<td bgcolor='#FFA73B' align='center'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
							<tr>
								<td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td bgcolor='#FFA73B' align='center' style='padding: 0px 10px 0px 10px;'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
							<tr>
								<td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
									<h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Welcome!</h1> <img src=' https://img.icons8.com/clouds/100/000000/handshake.png' width='125' height='120' style='display: block; border: 0px;' />
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
							<tr>
								<td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
									<p style='margin: 0;'>We're excited to have you get started. First, you need to confirm your account. Just enter the verification code.</p>
								</td>
							</tr>
							<tr>
								<td bgcolor='#ffffff' align='left'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0'>
										<tr>
											<td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
												<table border='0' cellspacing='0' cellpadding='0'>
													<tr>
														<td align='center' style='border-radius: 3px;' bgcolor='#FFA73B'><a href='#' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FFA73B; display: inline-block;'>" . $vars['code'] . "</a></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr> <!-- COPY -->
							<tr>
								<td bgcolor='#ffffff' align='left' style='padding: 0px 30px 0px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
									<p style='margin: 0;'>If that doesn't work, you may need to regenerate the verification code:</p>
								</td>
							</tr> <!-- COPY -->
							
							<tr>
								<td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
									<p style='margin: 0;'>If you have any questions, just reply to this email&mdash;we're always happy to help out.</p>
								</td>
							</tr>
							<tr>
								<td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
									<p style='margin: 0;'>Cheers,<br>Ins Team</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
							<tr>
								<td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
									<h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
									<p style='margin: 0;'><a href='#' target='_blank' style='color: #FFA73B;'>We&rsquo;re here to help you out</a></p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
							<tr>
								<td bgcolor='#f4f4f4' align='left' style='padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'> <br>
									<p style='margin: 0;'>If these emails get annoying, please feel free to <a href='#' target='_blank' style='color: #111111; font-weight: 700;'>unsubscribe</a>.</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>
		
		</html>";

	$subject = "Email verification";
	$recipient = $vars['email'];
	send_mail($recipient, $subject, $message);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	if (!check_verified()) {

		$query = "select * from verify where code = :code && email = :email";
		$vars = array();
		$vars['email'] = $_SESSION['USER']->email;
		$vars['code'] = $_POST['code'];

		$row = database_run($query, $vars);

		if (is_array($row)) {
			$row = $row[0];
			$time = time();

			if ($row->expires > $time) {

				$id = $_SESSION['USER']->Id;
				$query = "update users set email_verified = email where Id = '$id' limit 1";

				database_run($query);

				header("Location: profile.php");
				die;
			} else {
				echo "Code expired";
			}
		} else {
			echo "wrong code";
		}
	} else {
		echo "You're already verified";
	}
}

?>

<div class="container py-5">
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
				<ol class="breadcrumb mb-0">
					<li class="breadcrumb-item"><a href="#">Confirm Email Address</a></li>
				</ol>
			</nav>
		</div>
	</div>
	<br><br>
	<div>
		<div class="alert alert-warning" role="alert">
			<h1 class="warning">an email was sent to your address. paste the code from the email here</h1>
		</div>
		<div>
			<?php if (count($errors) > 0) : ?>
				<?php foreach ($errors as $error) : ?>
					<?= $error ?> <br>
				<?php endforeach; ?>
			<?php endif; ?>

		</div><br>
		<form method="post">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Verification Code</label>
				<input ttype="text" class="form-control  col-md-4" id="exampleFormControlInput1" name="code" placeholder="Enter your Code" placeholder="12345">
			</div>
			<input type="submit" class="btn btn-success" value="Verify">
		</form>
		<?php include('footer.php');
