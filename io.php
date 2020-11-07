<?php
include_once "db_queries.php";

function print_all($db)
{
    $result = get_all($db);
    if ($result) iterate_to_print($db, $result);
}

function print_upd_form($user, $contacts)
{
    ?>
    <div class="user">
        <form action="" method="post">
            <div class="name">
                <label class="label">
                    Имя
                </label>
                <input class="input" type="text" name="name_upd" value="<?=$user['user_name']?>">
            </div>
            <div class="contacts_upd">
                <?php $id = 1?>
                <label class="label">Контакты</label>
                <?php foreach ($contacts as $contact):?>
                    <div class="contact_entry">
                        <label class="label"><?="$id."?></label><input class="input" type="tel" name="phone[<?php echo $id ?>]" value="<?=$contact['phone_number']?>">
                        <input type="hidden" name="phone_id[<?php echo $id++ ?>]" value="<?=$contact['phone_id']?>">
                    </div>
                <?php endforeach;?>
            </div>
            <div class="footer__form">
                <button class="btn" type="button" id="add_phone_entry">Добавить контактный номер</button>
                <button class="btn" type="submit"  id="upd_btn" name="update">Обновить запись</button>
            </div>
        </form>
    </div>
    <?php
}

function print_card($user, $contacts)
{
    ?>
    <div class="user">
        <div class="head">
            <div class="name">
                <?php echo $user['user_name']; ?>
            </div>
            <div class="hrefs">
                <a href="/delete_record.php?del=<?php echo $_GET['upd']; ?>" class="del_btn"><img class="delete" src="assets/img/delete.png" alt=""></a>
            </div>
        </div>
        <div class="contacts">
            <?php foreach ($contacts as $contact):?>
                <div class="contact">
                    <?=$contact['phone_number']?>
                    <a href="/delete_phone.php?del=<?php echo $contact['phone_id']; ?>&usr=<?php echo $contact['user_id']; ?>" class="del_btn"><img class="delete" src="assets/img/x-mark.png" alt=""></a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <?php
}

function print_by_name($db, $name)
{
    $result = get_by_name($db, $name);

    if ($result) iterate_to_print($db, $result);
}

function iterate_to_print($db, $result)
{
    foreach ($result as $row)
    {
        $contacts = get_contacts($db, $row);
        ?>
        <div class="user">
            <div class="head">

                <div class="name">
                    <?=$row['user_name']?>
                </div>
                <div class="hrefs">
                    <a href="/update_entry.php?upd=<?php echo $row['user_id']; ?>" class="upd_btn"><img class="refresh" src="assets/img/refresh.png" alt=""></a>
                    <a href="/delete_record.php?del=<?php echo $row['user_id']; ?>" class="del_btn"><img class="delete" src="assets/img/delete.png" alt=""></a>
                </div>    
            </div>
            <div class="contacts">
                <?php foreach ($contacts as $contact):?>
                    <div class="contact">
                        <?=$contact['phone_number']?>
                        <a href="/delete_phone.php?del=<?php echo $contact['phone_id']; ?>&usr=<?php echo $contact['user_id']; ?>&home" class="del_btn"><img class="x-mark" src="assets/img/x-mark.png" alt=""></a>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php
    }
}