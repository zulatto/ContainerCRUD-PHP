<?php 
    include '../inc/connect.php';

    $container = $_POST['container'];
    $moveTipo = $_POST['moveTipo'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql = "INSERT INTO `movecontainer`(`nmContainer`, `tipoMovimentacao`, `startDate`, `endDate`) 
    VALUES ('$container','$moveTipo','$start','$end')";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('Container movimentado com sucesso');
    window.location.href = '../../index.php';
    </script>";
}else{
    echo "<script>alert('Falha na movimentação do container, tente novamente mais tarde');
    window.location.href = '../../index.php';
    </script>";
}
?>