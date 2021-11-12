<?php 
    include '../scripts/connect.php';

    $id = $_GET['id'];

    $sql = "UPDATE `container` 
    SET `active`= 0
    WHERE cd = $id";

    if( mysqli_query($conn, $sql)){
        echo "excluido";
    }else{
        echo "n excluido";
    }
?>