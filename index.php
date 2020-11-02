<link rel="stylesheet" href="/assets/css/style.css">

<a href="/add.php" class="btn">Создать новую запись</a>

<div>
    <form action="" method="post">
        <label> Имя <input type="text" name="name"></label>
        <button type="submit" id="find_by_name_btn" name="find">Найти пользователей по имени</button>
        <button type="submit" id="show_all" name="show_all">Показать всех</button>
    </form>
</div>

<?php
    include_once "db_queries.php";
    include_once "config_db.php";
    session_start();
    $db = init_db();
    if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['find']))
    {
        $_SESSION["name"] = $_POST["name"];
        print_db_by_name($db, $_POST["name"]);
    }
    else
    {
        ?>
        <div class="container">
            <?php print_all($db); ?>
        </div>
    <?php
    }
?>
