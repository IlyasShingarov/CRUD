<link rel="stylesheet" href="/assets/css/style.css">

<a href="/" class="btn">Назад к списку контактов</a>

<form action="" method="post">
    <label>Имя<input type="text" name="name"></label>
    <div class="phones_list"></div>
    <button type="button" id="add_btn_phone"> Добавить еще номер телефона</button>
    <button type="submit">Создать</button>
</form>

<?php
include_once "./config_db.php";
include_once "./db_queries.php";
$db = init_db();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    add_record($db, $_POST["name"], $_POST['phone']);
}
?>

<script>
    let id = 0;
    function add_phone_field(e) {
            e.preventDefault();
        id++;

        let list = document.querySelector(".phones_list");

        let label = document.createElement('label');
        label.className="phone";
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