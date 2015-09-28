<?php

for($i=0; $i<count($_POST['inputName']); $i++ ){
    if( isset( $_GET[ $_POST['inputName'][$i] ] ) ){
        unset($_GET[ $_POST['inputName'][$i] ]);
    }
}

