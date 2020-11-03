<?php
include_once "./db_queries.php";
include_once "./config_db.php";
$db = init_db();

if($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET['del']))
{
    delete_phone_by_pid($db, $_GET['del']);
    if (isset($_GET['home']))
        header("location: index.php");
    else
        header("location: update_entry.php?upd=" . $_GET['usr']);
}
