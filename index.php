<?php
include 'src/scripts/header.php';
include 'src/scripts/connect.php';

$search = $_POST['search'] ?? '';

$sql = "SELECT * FROM container WHERE container LIKE '%$search%' AND active = 1";

$data = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="src/css/main.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="src/views/cadastro.php">Cadastro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="src/views/moves.php">Movimentações</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Relatório</a>
      </li>
    </ul>
  </div>
  <form class="form-inline" method="POST" action="index.php">
        <input class="form-control mr-sm-2" type="search" aria-label="Search" name="search" autofocus>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
</nav>
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Numero container</th>
        <th scope="col">Tipo</th>
        <th scope="col">Status</th>
        <th scope="col">Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while( $row = mysqli_fetch_assoc($data)) {
                $cd = $row['cd'];
                $cliente = $row['cliente'];
                $container = $row['container'];
                $tipo = $row['type'];
                if($tipo == 0){
                    $tipo = 20;
                }else{
                    $tipo = 40;
                }
                $status = $row['state'];
                if($status == 0){
                    $status = "Vazio";
                }else{
                    $status = "Cheio";
                }
                $categoria = $row['category'];
                if($categoria == 0){
                    $categoria = "Importação";
                }else{
                    $categoria = "Exportação";
                }

                echo "<tr>
                <th scope='row'>$cliente</th>
                <td>$container</td>
                <td>$tipo</td>
                <td>$status</td>
                <td>$categoria</td>
                <td>
                    <a href='src/views/editCadastro.php?id=$cd' class='btn btn-success btn-sm'>Editar</a>
                    <a href='src/views/moveContainer.php?id=$cd' class='btn btn-primary btn-sm'>Movimentar</a>
                    <a href='src/scripts/delete.php?id=$cd' class='btn btn-danger btn-sm'>Excluir</a>
                </td>
                </tr>";
            }
        ?>
    </tbody>
    </table>
            </div>
        </div>
    </div>
</body>
</html>