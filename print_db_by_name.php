<?php
function print_db_by_name($db, $name)
{
    $statement = $db->prepare("SELECT * FROM users WHERE user_name like '$name'");
    $statement->execute();
    $result = $statement->fetchAll();

    foreach ($result as $row)
    {
        $contact_stat = $db->prepare("SELECT * FROM contacts where user_id = " . $row['user_id']);
        $contact_stat->execute();

        $contacts = $contact_stat->fetchAll();
        ?>
        <div class="user">
            <div class="user_id">
                <?=$row['user_id']?>
            </div>
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
}
?>