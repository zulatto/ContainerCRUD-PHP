<?php
include '../scripts/header.php';

include '../scripts/connect.php';

$search =  $_POST['search'] ?? '';

$sql = "SELECT * FROM movecontainer WHERE nmContainer LIKE '%$search%'";

$data = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/main.css">

    <title>Home</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand mb-0 h1" href="#">Container</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="../../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cadastro.php">Cadastro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="movimentacoes.php">Movimentações</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="relatorio.php">Relatórios</a>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline" method="POST" action="movimentacoes.php">
                        <input class="form-control mr-sm-2" type="search" aria-label="Search" name="search" autofocus>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                </nav>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Numero Container</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Horário de inicio</th>
                        <th scope="col">Horário de finalização</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($data)) {
                                $container = $row['nmContainer'];
                                $tipoMovimentacao = $row['tipoMovimentacao'];
                                switch($tipoMovimentacao){
                                    case 0 : $tipoMovimentacao = "Embarque"; break;
                                    case 1 : $tipoMovimentacao = "Descarga"; break;
                                    case 2 : $tipoMovimentacao = "Gate in"; break;
                                    case 3 : $tipoMovimentacao = "Gate out"; break;
                                    case 4 : $tipoMovimentacao = "Reposinamento"; break;
                                    case 5 : $tipoMovimentacao = "Pesagem"; break;
                                    case 6 : $tipoMovimentacao = "Scanner"; break;
                                }
                                $start = $row['startDate'];
                                $end = $row['startEnd'];
                                echo "<tr>
                                <th scope='row'>$container</th>
                                <td>$tipoMovimentacao</td>
                                <td>$start</td>
                                <td>$end</td>
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