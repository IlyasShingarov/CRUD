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
    $statement = $db->prepare("SELECT * FROM users ORDER BY user_id");
    $statement->execute();

    return $statement->fetchAll();
}

function get_contacts($db, $user)
{
    $contact_stat = $db->prepare("SELECT * FROM contacts where user_id = " . $user['user_id'] . "ORDER BY phone_id");
    $contact_stat->execute();

    return $contact_stat->fetchAll();
}

function get_by_name($db, $name)
{
    $statement = $db->prepare("SELECT * FROM users WHERE user_name like '$name%' ORDER BY user_id");
    $statement->execute();

    return $statement->fetchAll();
}

function delete_by_id($db, $id)
{
    $db->prepare("DELETE FROM users WHERE user_id = '$id'")->execute();
}

function update_name_by_id($db, $name, $id)
{
    $db->prepare("UPDATE users SET user_name=" . "'$name'" . ",user_id=" . "$id" . " WHERE user_id =" . "$id")->execute();
}

function update_contacts_by_ph_id($db, $phones, $phone_ids)
{
    for ($i = 1; $i <= count($phones); $i++)
    {
        $db->prepare("UPDATE contacts SET phone_number =" . $phones[$i] . " WHERE phone_id = " . $phone_ids[$i])->execute();
    }
}

function add_phones_by_uid($db, $phones, $uid)
{
    foreach ($phones as $ph)
    {
        $db->prepare("INSERT INTO contacts (user_id, phone_number) VALUES (".$uid.", '".$ph."');")->execute();
    }
}

function add_record($db, $name, $phones)
{
    $db->prepare("INSERT INTO users (user_name) VALUES ('".$name."')")->execute();
    $user_id = $db->lastInsertId();

    add_phones_by_uid($db, $phones, $user_id);
}

function delete_phone_by_pid($db, $pid)
{
    $db->prepare("DELETE FROM contacts WHERE phone_id = '$pid'")->execute();
}