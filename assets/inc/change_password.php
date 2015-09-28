<?php
session_start();
$includePath = '';
include_once('connect_db.php');
include_once('messages.php');

if (isset($_SESSION['user_id']))
{
    $person = Db::queryOne('SELECT person_password FROM persons_table WHERE person_id=?',$_SESSION['user_id']);
    if($_POST){
        if($_POST['current_password'] && $_POST['new_password'] && $_POST['confirm_new_password']){

            if(SHA1($_POST['current_password']."R^jblgfdr#") == $person['person_password']){
                if(SHA1($_POST['new_password']."R^jblgfdr#") != $person['person_password'] && SHA1($_POST['confirm_new_password']."R^jblgfdr#") != $person['person_password']){
                    if($_POST['new_password'] == $_POST['confirm_new_password'] ){
                        Db::query('UPDATE persons_table SET person_password=SHA1(?) WHERE person_id=? AND person_password=?', $_POST['new_password']."R^jblgfdr#", $_SESSION['user_id'], $person['person_password']);
                        $person = Db::queryOne('SELECT person_password FROM persons_table WHERE person_id=SHA1(?)',$_SESSION['user_id']);
                        echo('Done');
                    } else {
                        echo($messagePasswordNotMatch);
                    }
                } else {
                    echo($messagePasswordNewAsOld);
                }
            } else {
                echo($messagePasswordDifferent);
            }
        } else {
            echo($messagePasswordFillInputs);
        }
    }
}
