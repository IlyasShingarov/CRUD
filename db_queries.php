<?php

function get_user_by_id($db, $id)
{
    $statement = $db->prepare("SELECT * FROM users WHERE user_id =" . $id);
    $statement->execute();
    return $statement->fetch();
}

function get_contacts_by_id($db, $id)
{
    $statement = $db->prepare("SELECT * FROM contacts where user_id = " . $id);
    $statement->execute();
    return $statement->fetchAll();
}

function print_card($user, $contacts)
{
    ?>
    <div class="user">
        <div class="name">
            <?php echo $user['user_name']; ?>
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

function print_upd_form($user, $contacts)
{
    ?>
    <div class="user">
        <form action="" method="post">
            <div class="name">
                <label>
                    Имя
                    <input type="text" name="name" value="<?=$user['user_name']?>">
                </label>
            </div>
            <div class="contacts_upd">
                <?php $id = 1?>
                <label>Контакты</label>
                <?php foreach ($contacts as $contact):?>
                    <div class="contact">
                        <label><?="$id."?></label>
                        <input type="tel" name="phone[<?php echo $id++ ?>]" value="<?=$contact['phone_number']?>">
                    </div>
                <?php endforeach;?>
            </div>
        </form>
    </div>
    <?php
}

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
                    <a href="/update_entry.php?upd=<?php echo $row['user_id']; ?>" class="upd_btn">Update</a>
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