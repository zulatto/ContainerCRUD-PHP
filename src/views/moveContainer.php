<?php
    include '../inc/header.php';
    include '../inc/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/main.css">
    <title>Movimentações container</title>
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
                <form action="../controller/moveCadastro.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="container">Numero do container</label>
                            <input type="text" class="form-control" name="container" value="<?php echo $row['container']; ?>" readonly=“true”>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="moveTipo">Tipo de Movimentações</label>
                            <select name="moveTipo" class="form-control">
                            <option value="0">Embarque</option>
                            <option value="1">Descarga</option>
                            <option value="2">Gate in</option>
                            <option value="3">Gate out</option>
                            <option value="4">Reposicionamento</option>
                            <option value="5">Pesagem</option>
                            <option value="6">Scanner</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="start">Inicio</label>
                                <input type="datetime-local" class="form-control" name="start" required>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="end">Fim</label>
                                <input type="datetime-local" class="form-control" name="end" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <input type="hidden" name="id" value="<?php echo $row['cd']; ?>">
                </form>
                <a href='../../index.php' class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</body>
</html>