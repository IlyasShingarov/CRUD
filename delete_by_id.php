<?php
function delete_by_id($db, $id)
{
    $db->prepare("DELETE FROM users WHERE user_id = '$id'")->execute();
}