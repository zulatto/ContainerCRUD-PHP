<?php
    include '../scripts/header.php';
    include '../scripts/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/main.css">
    <title>Cadastro container</title>
</head>
<body>

    <?php
                $id = $_GET['id'] ?? '';

                $sql = "SELECT * FROM container WHERE cd = $id";
        
                $data = mysqli_query($conn, $sql);
        
                $row = mysqli_fetch_assoc($data);
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Cadastro</h2>
                <form action="../scripts/cadastroScript.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cliente">Nome</label>
                            <input type="text" class="form-control" name="cliente" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="container">Numero do container</label>
                            <input type="text" class="form-control" name="container" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tipo">Tipo</label>
                            <select name="tipo" class="form-control">
                                <option value="0">20</option>
                                <option value="1">40</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="0">Vazio</option>
                                    <option value="1">Cheio</option>
                                </select>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="Categoria">Categoria</label>
                                <select name="categoria" class="form-control">
                                    <option value="0">Importação</option>
                                    <option value="1">Exportação</option>
                                </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
                <a href='../../index.php' class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</body>
</html>

