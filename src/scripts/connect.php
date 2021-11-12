<?php
// Conexão feita em linguangem estilo procedural

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "teste";

    if( $conn = mysqli_connect($server, $user, $pass, $db)){
    }else{
        echo "no connect";
    }
?>