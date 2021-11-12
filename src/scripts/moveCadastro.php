<?php 
    include '../scripts/connect.php';

    $container = $_POST['container'];
    $moveTipo = $_POST['moveTipo'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql = "INSERT INTO `movecontainer`(`nmContainer`, `tipoMovimentacao`, `startDate`, `startEnd`) 
    VALUES ('$container','$moveTipo','$start','$end')";

    if( mysqli_query($conn, $sql)){
        echo "enviado";
    }else{
        echo "n eviado";
    }
?>