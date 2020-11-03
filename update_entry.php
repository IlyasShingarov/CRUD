<?php session_start();?>

<link rel="stylesheet" href="/assets/css/style.css">
<div class="main">
    <?php
    include_once "db_queries.php";
    include_once "io.php";
    include_once "config_db.php";
    $db = init_db();

    if (isset($_GET['upd']))
    {
        $id = $_SESSION['id'] = $_GET['upd'];

        if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['update']))
        {
            update_name_by_id($db, $_POST['name_upd'], $id);
            if (isset($_POST['phone']))
            {
                update_contacts_by_ph_id($db, $_POST['phone'], $_POST['phone_id']);
            }

            if (isset($_POST['add_phone']))
            {
                add_phones_by_uid($db, $_POST['add_phone'], $id);
            }
        }

        $user_record = get_user_by_id($db, $id);
        $contacts_record = get_contacts_by_id($db, $id);

        print_card($user_record, $contacts_record);
        print_upd_form($user_record, $contacts_record);
    }
    ?>
    <div class="back__form">
        <a href="/"><button class="btn btn__back">Назад</button></a>
    </div>
</div>

<script>
    //let id = document.getElementsByClassName('contact').length;
    let id = 0;
    function add_entry() {
        let list = document.querySelector(".contacts_upd");

        let entry = document.createElement("div");
        entry.className="contact_entry";

        let label = document.createElement("label");
        label.innerText = "+.";

        let inp = document.createElement("input");
        inp.type="tel";
        inp.name="add_phone[" + ++id + "]";

        label.classList.add("label");
        inp.classList.add("input");

        entry.appendChild(label);
        entry.appendChild(inp);
        list.appendChild(entry);
    }

    function init() {
        document.getElementById("add_phone_entry").addEventListener("click", add_entry);
    }

    document.addEventListener('DOMContentLoaded', init);
</script>