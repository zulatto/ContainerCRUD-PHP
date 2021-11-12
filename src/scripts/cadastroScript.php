<?php 
    include '../scripts/connect.php';

    $cliente = $_POST['cliente'];
    $container = $_POST['container'];
    $tipo = $_POST['tipo'];
    $status = $_POST['status'];
    $categoria = $_POST['categoria'];

    $sql = "INSERT INTO `container`(`cliente`, `container`, `type`, `state`, `category`) VALUES ('$cliente','$container','$tipo','$status','$categoria')";

    if( mysqli_query($conn, $sql)){
        echo "enviado";
    }else{
        echo "n eviado";
    }
?>