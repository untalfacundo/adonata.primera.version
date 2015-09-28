<?php
mb_internal_encoding("UTF-8");
$includePath = '';
include_once('Db.php');
include_once('connect_db.php');
include_once('messages.php');

if($_POST){
    $header = 'From:' . $_POST['email'];
    $header .= "\nMIME-Version: 1.0\n";
    $header .= "Content-Type: text/html; charset=\"utf-8\"\n";
    $address = '';
    $message = '';

    if( $_POST['action'] == 'contact' ){
        $address = 'hithemestarz@gmail.com';
        $subject = $messageEmailContactForm;
        $message = $_POST['message'];
    }
    if( $_POST['action'] == 'person' ){
        $person = Db::queryOne('SELECT email FROM persons_table WHERE person_id=?', $_POST['person']);
        $item = Db::queryOne('SELECT title FROM items_table WHERE item_id=?', $_POST['item_number']);
        $address = $person['email'];
        $subject = $messageEmailAgentContactItemDetail . $item['title'];
        $message = $messageEmailAgentContactItemDetailItemTitle . $item['title'];
        $message .= "<br>";
        $message .= $messageEmailAgentContactItemDetailItemNumber . $_POST['item_number'];
        $message .= '<br><br>';
        $message .= $_POST['message'];
    }

    $success = mb_send_mail($address, $subject, $message, $header);
    if ($success)
    {
        echo 'Email has been sent!';
    }
    else
        echo 'Unable to send an email. Please check the inputs.';

}