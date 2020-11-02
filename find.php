<link rel="stylesheet" href="/assets/css/style.css">

<?php
include_once "./config_db.php";
include_once "./db_queries.php";
session_start();
$db = init_db();
if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['find']))
{
    $_SESSION["name"] = $_POST["name"];
    print_db_by_name($db, $_POST["name"]);
}
?>

<form action="" method="post">
    <label>
        Имя
        <input type="text" name="name">
    </label>
    <button type="submit" id="find_by_name_btn" name="find">Найти пользователей по имени</button>
</form>
