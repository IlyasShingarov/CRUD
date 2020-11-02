<link rel="stylesheet" href="/assets/css/style.css">

<a href="/add.php" class="btn">
    Создать новую запись
</a>

<a href="/find.php" class="btn">
    Найти записи
</a>

<div class="container">
    <?php
    include_once "db_queries.php";
    include_once "config_db.php";
    $db = init_db();
    print_all($db);
    ?>
</div>