<?php
include_once "./config_db.php";
$db = init_db();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    //echo $_POST["name"] . "<br>";

    $db->prepare("INSERT INTO users (user_name) VALUES ('".$name."')")->execute();
    //var_dump("INSERT INTO user (`user_name`) VALUES ('".$name."')");
    $user_id = $db->lastInsertId();

    foreach ($_POST["phone"] as $ph)
    {
        //echo $ph . "<br>";
        $db->prepare("INSERT INTO contacts (user_id, phone_number) VALUES (".$user_id.", '".$ph."');")->execute();
    }
}
?>

<form action="" method="post">
    <label>
        Имя
        <input type="text" name="name">
    </label>
    <div class="phones_list">

    </div>

    <button type="button" id="add_btn_phone"> Добавить еще номер телефона</button>

    <button type="submit">Создать</button>

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

    function init(e) {
        add_phone_field(e);
        document.getElementById("add_btn_phone").addEventListener("click", add_phone_field);
    }
    document.addEventListener('DOMContentLoaded', init);
</script>