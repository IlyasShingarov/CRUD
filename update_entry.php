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

    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['update']))
    {
        update_name_by_id($db, $_POST['name_upd'], $id);
        print_r($_POST);
        $phone = $_POST['phone'];
        $phone_id = $_POST['phone_id'];
        $db->prepare("UPDATE contacts SET phone_number =" . "$phone" . "WHERE user_id =" . "$id" . "AND phone_id = " . "$phone_id")->execute();
    }

    $user_record = get_user_by_id($db, $id);
    $contacts_record = get_contacts_by_id($db, $id);

    print_card($user_record, $contacts_record);
    print_upd_form($user_record, $contacts_record);
}
?>

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