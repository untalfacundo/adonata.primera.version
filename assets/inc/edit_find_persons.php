<?php
$includePath = '';
include_once('Db.php');
include_once('connect_db.php');

if( $_POST['action'] == 'find_persons' ) {
    $person = Db::queryAll('SELECT person_name, person_id, account_type, assigned_company FROM persons_table WHERE account_type=? AND assigned_company=? ORDER BY person_name', 'agent', $_POST['company_id']);
}
?>

<select name="assigned_person" id="assigned_person" class="selectpicker">
    <option value="">- Select Agent -</option>
    <?php for($i=0; $i<count($person); $i++) : ?>
        <option value="<?= $person[$i]['person_id'] ?>"><?= $person[$i]['person_name'] ?></option>
    <?php endfor ?>
</select>
