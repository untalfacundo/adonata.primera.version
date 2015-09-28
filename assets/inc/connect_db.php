<?php
include_once($includePath.'Db.php');

Db::connect('localhost','adonata','root','501062');

$config = Db::queryOne('SELECT * FROM configuration_table');
if( isset($_SESSION['user_id']) ){
    $user = Db::queryOne('SELECT account_type, is_admin, agency_admin, person_name FROM persons_table WHERE person_id=?', $_SESSION['user_id']);
}
