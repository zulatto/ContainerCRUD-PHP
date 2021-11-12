<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "teste";

    if( $conn = mysqli_connect($server, $user, $pass, $db)){
    }else{
        echo "no connect";
    }
?>