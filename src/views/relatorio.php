<?php
include '../scripts/header.php';

include '../scripts/connect.php';


$sql_total = "SELECT category, COUNT(cd) AS qtd_category FROM container GROUP BY category";

$sql_relatorio = "SELECT COUNT(movecontainer.tipoMovimentacao) AS qtd, container.cliente AS cliente, container.container AS container, movecontainer.tipoMovimentacao AS tipoMovimentacao FROM movecontainer JOIN container ON movecontainer.nmContainer = container.container GROUP BY movecontainer.tipoMovimentacao";

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
                                <a class="nav-link" href="movimentacoes.php">Movimentação</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="relatorios.php">Relatórios</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <h1>Relatório</h1>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Tipo de Movimentação</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data_relatorio = mysqli_query($conn, $sql_relatorio);
                        
                            while($row_relatorio = mysqli_fetch_assoc($data_relatorio)) {
                                $cliente = $row_relatorio['cliente'];
                                $tipoMovimentacao = $row_relatorio['tipoMovimentacao'];
                                switch($tipoMovimentacao){
                                    case 0 : $tipoMovimentacao = "Embarque"; break;
                                    case 1 : $tipoMovimentacao = "Descarga"; break;
                                    case 2 : $tipoMovimentacao = "Gate in"; break;
                                    case 3 : $tipoMovimentacao = "Gate out"; break;
                                    case 4 : $tipoMovimentacao = "Reposinamento"; break;
                                    case 5 : $tipoMovimentacao = "Pesagem"; break;
                                    case 6 : $tipoMovimentacao = "Scanner"; break;
                                }
                                $qtd = $row_relatorio['qtd'];

                                echo "<tr>
                                <th scope='row'>$cliente</th>
                                <th>$tipoMovimentacao</th>
                                <th>$qtd</th>
                                </tr>";
                            }
                        ?>
                    </tbody>
                    </table>
                <hr>
                <h4>Importação/Exportação</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Categoria</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data_total = mysqli_query($conn, $sql_total);
                            
                            while($row_total = mysqli_fetch_assoc($data_total)){
                                $category = $row_total['category'];
                                if($category == 0){
                                    $category = "Importação";
                                }else{
                                    $category = "Exportação";
                                }
                                $qtd_category = $row_total['qtd_category'];

                                echo "<tr>
                                <th>$category</th>
                                <th>$qtd_category</th>
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