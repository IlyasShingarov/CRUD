<?php
function print_all($db)
{
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
                <div>
                    <a href="/delete_entry.php?del=<?php echo $row['user_id']; ?>" class="del_btn">Delete</a>
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
}

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
            <div class="name">
                <?=$row['user_name']?>
            </div>
            <div>
                <a href="/delete_entry.php?del=<?php echo $row['user_id']; ?>" class="del_btn">Delete</a>
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

function delete_by_id($db, $id)
{
    $db->prepare("DELETE FROM users WHERE user_id = '$id'")->execute();
}
?>