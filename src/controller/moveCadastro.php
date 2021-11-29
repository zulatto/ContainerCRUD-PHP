<?php 
    include '../inc/connect.php';

    $container = $_POST['container'];
    $moveTipo = $_POST['moveTipo'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql = "INSERT INTO `movecontainer`(`nmContainer`, `tipoMovimentacao`, `startDate`, `endDate`) 
    VALUES ('$container','$moveTipo','$start','$end')";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('container movimentado');
    window.location.href = '../../index.php';
    </script>";
}else{
    echo "<script>alert('container nao movimentado');
    window.location.href = '../../index.php';
    </script>";
}
?>