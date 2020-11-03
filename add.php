<link rel="stylesheet" href="/assets/css/style.css">

<div class="main main__add">

    <a href="/" class="back"><img src="back.png" alt=""></a>

    <form class="form" action="" method="post">
        <div class="form__list">

            <div class="card">
                <label class="label">Имя</label>
                <input class="input" type="text" name="name">
            </div>
            
            <div class="list">
                
                </div>
                
                <button class="add btn" type="button" id="add_btn_phone"> Добавить еще номер телефона</button>
            </div>
        <button class="create btn"type="submit">Создать</button>
    </form>
</div>

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

        let list = document.querySelector(".list");

        let div = document.createElement("div");
        let close = document.createElement("button");
        div.classList.add("card");
        close.classList.add("close");
        let label = document.createElement('label');
        label.className="phone";
        label.innerText = "Номер телефона " + id;
        label.classList.add("label");

        let inp = document.createElement("input");
        inp.type="tel";
        inp.name="phone["+ (id - 1) +"]";
        inp.classList.add("input");
        div.appendChild(label);
        div.appendChild(inp);
        // div.appendChild(close);

        list.appendChild(div);

    }



    function init(e) {
        add_phone_field(e);
        document.getElementById("add_btn_phone").addEventListener("click", add_phone_field);
    }
    document.addEventListener('DOMContentLoaded', init);
</script>