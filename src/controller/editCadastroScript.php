<?php 
    include '../inc/connect.php';

    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $container = $_POST['container'];
    $tipo = $_POST['tipo'];
    $status = $_POST['status'];
    $categoria = $_POST['categoria'];

    $sql = "UPDATE `container` 
    SET `cliente`='$cliente',`container`='$container',`type`='$tipo',`state`='$status',`category`='$categoria'
    WHERE cd = $id";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('Container editado com sucesso');
    window.location.href = '../../index.php';
    </script>";
}else{
    echo "<script>alert('Falha na edição de container, tente novamente mais tarde');
    window.location.href = '../../index.php';
    </script>";
}
?>