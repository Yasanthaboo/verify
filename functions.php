<?php

session_start();

function signup($data)
{
	$errors = array();

	//validate 

	if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Please enter a valid email";
	}

	if (strlen(trim($data['password'])) < 4) {
		$errors[] = "Password must be atleast 4 chars long";
	}

	if ($data['password'] != $data['password2']) {
		$errors[] = "Passwords must match";
	}

	$check = database_run("select * from users where email = :email limit 1", ['email' => $data['email']]);
	if (is_array($check)) {
		$errors[] = "That email already exists";
	}

	//save
	if (count($errors) == 0) {


		$arr['lastname'] = $data['lastname'];
		$arr['firstname'] = $data['firstname'];
		$arr['phoneno'] = $data['phoneno'];
		$arr['email'] = $data['email'];
		$arr['password'] = hash('sha256', $data['password']);
		$arr['date'] = date("Y-m-d H:i:s");

		$query = "insert into users (email,password,date,firstname,lastname,phoneno,roleId,active) values 
		(:email,:password,:date,:firstname,:lastname,:phoneno,1,1)";

		database_run($query, $arr);
	}
	return $errors;
}

function login($data)
{
	$errors = array();

	//validate 
	if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Please enter a valid email";
	}

	if (strlen(trim($data['password'])) < 4) {
		$errors[] = "Password must be atleast 4 chars long";
	}

	//check
	if (count($errors) == 0) {

		$arr['email'] = $data['email'];
		$password = hash('sha256', $data['password']);

		$query = "select * from users where email = :email limit 1";

		$row = database_run($query, $arr);

		if (is_array($row)) {
			$row = $row[0];

			if ($password === $row->password) {

				$_SESSION['USER'] = $row;
				$_SESSION['LOGGED_IN'] = true;
			} else {
				$errors[] = "wrong email or password";
			}
		} else {
			$errors[] = "wrong email or password";
		}
	}
	return $errors;
}

function database_run($query, $vars = array())
{
	$string = "mysql:host=localhost;dbname=verify_db";
	$con = new PDO($string, 'root', '');

	if (!$con) {
		return false;
	}
	$stm = $con->prepare($query);
	$check = $stm->execute($vars);

	if ($check) {
		$data = $stm->fetchAll(PDO::FETCH_OBJ);

		if (count($data) > 0) {
			return $data;
		}
	}

	return false;
}

function check_login($redirect = true)
{

	if (isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN'])) {

		return true;
	}

	if ($redirect) {
		header("Location: login.php");
		die;
	} else {
		return false;
	}
}

function check_verified()
{

	$id = $_SESSION['USER']->Id;
	$query = "select * from users where Id = '$id' limit 1";
	$row = database_run($query);

	if (is_array($row)) {
		$row = $row[0];

		if ($row->email == $row->email_verified) {

			return true;
		}
	}

	return false;
}

function load_pages()
{
	$id = $_SESSION['USER']->Id;
	$query = "select * from users where Id = '$id' limit 1";
	$user = database_run($query);
	if (is_array($user)) {
		$user = $user[0];
		$role_id = $user->roleId;
		$role_query = "select * from pages where roleId <= ' $role_id' ";
		$pages = database_run($role_query);
	}
	return $pages;
}

function load_settings()
{
	$query = "select * from settings limit 1";
	$settings = database_run($query);
	if (is_array($settings)) {
		$settings = $settings[0];
	}
	return $settings;
}
