<?php 
    include '../inc/connect.php';

    $id = $_GET['id'];

    $sql = "UPDATE `container` 
    SET `active`= 0
    WHERE cd = $id";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('container excluido');
    window.location.href = '../../index.php';
    </script>";
}else{
    echo "<script>alert('container nao excluido');
    window.location.href = '../../index.php';
    </script>";
}
?>