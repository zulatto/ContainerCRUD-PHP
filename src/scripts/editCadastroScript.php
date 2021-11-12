<?php 
    include '../scripts/connect.php';

    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $container = $_POST['container'];
    $tipo = $_POST['tipo'];
    $status = $_POST['status'];
    $categoria = $_POST['categoria'];

    $sql = "UPDATE `container` 
    SET `cliente`='$cliente',`container`='$container',`type`='$tipo',`state`='$status',`category`='$categoria'
    WHERE cd = $id";

    if( mysqli_query($conn, $sql)){
        echo "alterado";
    }else{
        echo "n alterado";
    }
?>