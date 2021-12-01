<?php 
    include '../inc/connect.php';

    $id = $_POST['id'];

    $sql = "UPDATE `container` 
    SET `active`= 0
    WHERE cd = $id";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('Container excluído com sucesso');
    window.location.href = '../../index.php';
    </script>";
}else{
    echo "<script>alert('Falha na exclusão do container, tente novamente mais tarde');
    window.location.href = '../../index.php';
    </script>";
}
?>