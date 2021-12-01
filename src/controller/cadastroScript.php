<?php 
    include '../inc/connect.php';

    $cliente = $_POST['cliente'];
    $container = $_POST['container'];
    $tipo = $_POST['tipo'];
    $status = $_POST['status'];
    $categoria = $_POST['categoria'];

    $sql = "INSERT INTO `container`(`cliente`, `container`, `type`, `state`, `category`) VALUES ('$cliente','$container','$tipo','$status','$categoria')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Container $container cadastrado com sucesso');
        window.location.href = '../../index.php';
        </script>";
    }else{
        echo "<script>alert('Falha no cadastro do container, tente novamente mais tarde');
        window.location.href = '../../index.php';
        </script>";
    }
?>