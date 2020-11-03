<?php session_start();?>
<link rel="stylesheet" href="assets/css/style.css">
<div class="main">
    <div>
        <form action="" method="post">
            <div class="form__interface">

                <a href="add.php" class="btn">Создать новую запись</a>
                <div class="search">

                    <label class="label"> Имя </label>
                    <input class="input"type="text" name="name">
                </div>    
            </div>
            <div class="footer__form">
                <button class="btn"type="submit" id="find_by_name_btn" name="find">Найти</button>
                <button class="btn"type="submit" id="show_all" name="show_all">Показать всех</button>
            </div>
        </form>
    </div>
    
    <?php
    include_once "db_queries.php";
    include_once "config_db.php";
    include_once "io.php";
    $db = init_db();
    if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['find']))
    {
        $_SESSION["name"] = $_POST["name"];
        print_by_name($db, $_POST["name"]);
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
</div>