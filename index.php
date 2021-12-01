<?php
include 'src/inc/header.php';
include 'src/inc/connect.php';

$search = $_POST['search'] ?? '';

$sql = "SELECT * FROM container WHERE active = 1 AND( container LIKE '%$search%' OR cliente LIKE '%$search%')";

$data = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="src/assets/css/main.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Container</a>
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
        <a class="nav-link" href="src/views/movimentacoes.php">Movimentações</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="src/views/relatorio.php">Relatório</a>
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
        <th scope="col">Funções</th>
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
                    <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirmDelete'
                    onclick=" . '"' ."getData('$cd', '$container')" . '"' ."
                    >Excluir</a>
                </td>
                </tr>";
            }
        ?>
    </tbody>
    </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="src/controller/delete.php" method="POST">
                <p>Deseja realmente excluir o container <b id="numContainer">Numero container</b>?</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <input type="hidden" name="id" id="cd_container" value="">
            <button type="submit" class="btn btn-danger">Sim</button>
            </form>
            </div>
        </div>
        </div>
    </div>

    <script type="text/javascript">
        function getData(id, num_Container){
            document.getElementById('numContainer').innerHTML = num_Container;
            document.getElementById('cd_container').value = id;
        }
    </script>
</body>
</html>