<link rel="stylesheet" href="/assets/css/style.css">

<a href="/add.php" class="btn">
    Создать новый телефон
</a>

<a href="/delete.php" class="btn">
    Удалить пользователя по имени
</a>

<div class="container">

    <?php
    include_once "config_db.php";
    $db = init_db();
    $statement = $db->prepare("SELECT * FROM users");
    $statement->execute();

    $result = $statement->fetchAll();

    if ($result)
    {
        foreach ($result as $row)
        {
            $contact_stat = $db->prepare("SELECT * FROM contacts where user_id = " . $row['user_id']);
            $contact_stat->execute();

            $contacts = $contact_stat->fetchAll();
            ?>
            <div class="user">
                <div class="name">
                    <?=$row['user_name']?>
                </div>
                <div class="contacts">
                    <?php foreach ($contacts as $contact):?>
                        <div class="contact">
                            <?=$contact['phone_number']?>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
            <?php
        }
        ?>
        <?php
    }
    ?>

</div>