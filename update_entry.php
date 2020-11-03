<link rel="stylesheet" href="/assets/css/style.css">

<?php
include_once "db_queries.php";
include_once "io.php";
include_once "config_db.php";
session_start();
$db = init_db();

if (isset($_GET['upd']))
{
    $id = $_SESSION['id'] = $_GET['upd'];
    $update = true;

    $user_record = get_user_by_id($db, $id);
    $contacts_record = get_contacts_by_id($db, $id);

    print_card($user_record, $contacts_record);
    print_upd_form($user_record, $contacts_record);

    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['update']))
    {
        $name = $_POST['name'];
        $db->prepare("UPDATE users SET user_name =" . "$name" . " WHERE user_id " . "= $id")->execute();
        $db->prepare("UPDATE contacts SET phone_number =" . "$name" . " WHERE user_id " . "= $id")->execute();
    }
}

?>

<form action="" method="post">
    <button type="button" id="add_phone_entry">Добавить контактный номер</button>
    <button type="submit"  id="upd_btn" name="update">Обновить запись</button>
</form>

<script>
    let id = 0;
    function add_entry() {
        let list = document.querySelector(".contacts_upd");

        let entry = document.createElement("div");
        entry.className="contact";

        let label = document.createElement("label");
        label.innerText = "+. ";

        let inp = document.createElement("input");
        inp.type="tel";
        inp.name="phone[+" + ++id + "]";

        label.appendChild(inp);
        entry.appendChild(label);
        list.appendChild(entry);
    }

    function init() {
        document.getElementById("add_phone_entry").addEventListener("click", add_entry);
    }

    document.addEventListener('DOMContentLoaded', init);
</script>