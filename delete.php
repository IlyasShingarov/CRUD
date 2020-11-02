<link rel="stylesheet" href="/assets/css/style.css">

<?php
include_once "./config_db.php";
include_once "./print_db_by_name.php";
include_once "./delete_by_id.php";
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


<script>
    let id = 0;
    function add_phone_field(e) {
        e.preventDefault();
        id++;

        let list = document.querySelector(".phones_list");

        let label = document.createElement('label');
        label.innerText = "Номер телефона " + id;
        let inp = document.createElement("input");
        inp.type="tel";
        inp.name="phone["+ (id - 1) +"]";
        label.appendChild(inp);
        list.appendChild(label);
    }

    function print_search(e) {

    }

    function init(e) {
        add_phone_field(e);
        document.getElementById("find_by_name_btn").addEventListener("click", print_search);
    }

    document.addEventListener('DOMContentLoaded', init);
</script>