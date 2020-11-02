<?php
include_once "./db_queries.php";
include_once "./config_db.php";
$db = init_db();

if($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET['del']))
{
    delete_by_id($db, $_GET['del']);
    header('location: index.php');
}
