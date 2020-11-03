<?php

function get_user_by_id($db, $id)
{
    $statement = $db->prepare("SELECT * FROM users WHERE user_id =" . $id);
    $statement->execute();
    return $statement->fetch();
}

function get_contacts_by_id($db, $id)
{
    $statement = $db->prepare("SELECT * FROM contacts where user_id = " . $id);
    $statement->execute();
    return $statement->fetchAll();
}

function get_all($db)
{
    $statement = $db->prepare("SELECT * FROM users");
    $statement->execute();

    return $statement->fetchAll();
}

function get_contacts($db, $user)
{
    $contact_stat = $db->prepare("SELECT * FROM contacts where user_id = " . $user['user_id']);
    $contact_stat->execute();

    return $contact_stat->fetchAll();
}

function get_by_name($db, $name)
{
    $statement = $db->prepare("SELECT * FROM users WHERE user_name like '$name'");
    $statement->execute();

    return $statement->fetchAll();
}

function delete_by_id($db, $id)
{
    $db->prepare("DELETE FROM users WHERE user_id = '$id'")->execute();
}

function update_name_by_id($db, $name, $id)
{
    $db->prepare("UPDATE users SET user_name=" . "'$name'" . " WHERE user_id =" . "$id")->execute();
}

function update_contact_by_id($db, $id)
{}