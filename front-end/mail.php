<?php

    $json_data = file_get_contents('./config.json');
    $json = json_decode($json_data);

    $addres = $json->email;
    $name = $_POST["data1"];
    $emailOrNumber = $_POST["data2"];
    $language = $_POST["data3"];

    if ($language === '') {
        $message = "$name \n $emailOrNumber";
    }
    else {
        $message = "$name \n $emailOrNumber \n $language";
    }

    if (mail($addres, "Заявка", "$message")) {
        echo 'done';
    }
    else {
        echo 'error';
    }
?>