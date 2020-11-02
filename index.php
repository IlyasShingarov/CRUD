<link rel="stylesheet" href="/assets/css/style.css">

<a href="/add.php" class="btn">
    Создать новый телефон
</a>

<a href="/delete.php" class="btn">
    Удалить пользователя по имени
</a>

<div class="container">

    <?php
    include_once "db_queries.php";
    include_once "config_db.php";
    $db = init_db();

    print_all($db);


    ?>
</div>