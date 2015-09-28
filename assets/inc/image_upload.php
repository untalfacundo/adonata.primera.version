<?php
include_once('Db.php');

if($_POST){
    $image = $_FILES['image']['name'];
    echo $image;
    if(!$image){
        Db::query('
        UPDATE persons_table
        SET person_name=?, description=?, phone=?, mobile=?, email=?, skype=?, twitter=?, facebook=?, pinterest=?
        WHERE person_id=?',
            $_POST['person_name'], $_POST['description'], $_POST['phone'], $_POST['mobile'], $_POST['email'], $_POST['skype'], $_POST['twitter'], $_POST['facebook'], $_POST['pinterest'], $_SESSION['user_id']
        );
    } else {
        Db::query('
        UPDATE persons_table
        SET image=?
        WHERE person_id=?',
            $image, $_SESSION['user_id']
        );
    }
    header('Location: index.php?page=profile');
}