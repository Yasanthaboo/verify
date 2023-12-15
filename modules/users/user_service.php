<?php
function Get_users()
{
    $errors = array();
    $users = database_run("select * from users", array());
    if (!$users) {
        $errors[] = "Unable to load users";
    }
    //save
    if (count($errors) == 0) {
        return $users;
    }
    return $errors;
}

function Update_User($data)
{
    try {
        $action  = $data["btn_action"];
        $id = (int) str_replace('Update_', '', $action);
        $active = true;
        if (!isset($data['active_' . $id])) {
            $active = false;
        }
        $arr['id'] = $id;
        $arr['active'] = $active;
        $arr['role'] = $data['role_' . $id];
        $errors = array();
        $query = "Update users set active= :active, roleId = :role where id = :id";
        database_run($query, $arr);
    } catch (Exception) {
        $errors[] = "Unable to delete user";
    }
    return $errors;
}


function Remove_User($data)
{
    $action  = $data["btn_action"];
    $id = (int) str_replace('Remove_', '', $action);
    $errors = array();
    try {
        database_run("delete from users where id =" .  $id, array());
    } catch (Exception) {
        $errors[] = "Unable to delete user";
    }
    return $errors;
}
