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

if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['delete']))
{
    delete_by_id($db, $_POST["del_user_id"]);
    print_db_by_name($db, $_SESSION["name"]);
}
?>

<form action="" method="post">
    <label>
        Имя
        <input type="text" name="name">
    </label>
    <button type="submit" id="find_by_name_btn" name="find">Найти пользователей по имени</button>

    <label>
        Номер пользователя
        <input type="number" name="del_user_id">
    </label>
    <button type="submit" name="delete">Удалить</button>

</form>

<?php
if (isset($_GET['del'])) {
$id = $_GET['del'];
echo $id;
}