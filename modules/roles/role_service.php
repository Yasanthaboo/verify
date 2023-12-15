<?php


function Add_Role($data)
{

    $errors = array();
    //validate 

    if ($data['rolename'] == '') {
        $errors[] = "Please enter a valid role name";
    }

    $check = database_run("select * from roles where rolename = :rolename limit 1", ['rolename' => $data['rolename']]);
    if (is_array($check)) {
        $errors[] = "That role name already exists";
    }

    //save
    if (count($errors) == 0) {


        $arr['rolename'] = $data['rolename'];
        $arr['date'] = date("Y-m-d H:i:s");

        $query = "insert into roles (rolename,date) values 
		(:rolename,:date)";

        database_run($query, $arr);
    }
    return $errors;
}

function Get_Role()
{
    $errors = array();
    $roles = database_run("select * from roles", array());
    if (!$roles) {
        $errors[] = "Unable to load roles";
    }
    //save
    if (count($errors) == 0) {
        return $roles;
    }
    return $errors;
}

function Remove_Role($data)
{
    $errors = array();
    try {
        database_run("delete from roles where id in(" . $data . ")", array());
    } catch (Exception) {
        $errors[] = "Unable to delete roles";
    }
    return $errors;
}
