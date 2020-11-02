<link rel="stylesheet" href="/assets/css/style.css">

<?php
include_once "db_queries.php";
include_once "config_db.php";

$db = init_db();

if (isset($_GET['upd']))
{
    $id = $_GET['upd'];
    $update = true;

    $user_record = get_user_by_id($db, $id);
    $contacts_record = get_contacts_by_id($db, $id);

    print_card($user_record, $contacts_record);
    print_upd_form($user_record, $contacts_record);
}
?>

<form action="" method="post">
    <button type="button" id="add_phone_entry">Добавить контактный номер</button>
    <button type="submit"  id="upd_btn">Обновить запись</button>
</form>

<script>
    let id = 0;
    function add_entry(e) {
        e.preventDefault();

        let list = document.querySelector(".contacts_upd");
        let entry = document.createElement("div");
        entry.className="contact";
        let inp = document.createElement("input");
        inp.type="tel";
        inp.name="phone[+" + ++id + "]";
        entry.appendChild(inp);
        list.appendChild(entry);

    }

    function init(e) {
        document.getElementById("add_phone_entry").addEventListener("click", add_entry);
    }

    document.addEventListener('DOMContentLoaded', init);
</script>