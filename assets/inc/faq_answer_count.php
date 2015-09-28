<?php
$includePath = '';
include_once('Db.php');
include_once('connect_db.php');

$count = Db::queryOne('SELECT counter FROM faq_table WHERE faq_id=?', $_POST['id'] );

if( $_POST['action'] == 'no' ) {
    echo( 'This answer was helpful for ' . '<strong>' . ($count['counter']) . '</strong>' . ' people' );
}
elseif ( $_POST['action'] == 'yes' ) {
    Db::query('UPDATE faq_table SET counter=? WHERE faq_id=?', $count['counter']+1, $_POST['id'] );
    echo( 'This answer was helpful for ' . '<strong>' . ($count['counter']+1) . '</strong>' . ' people' );
}