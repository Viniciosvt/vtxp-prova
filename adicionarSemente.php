<?php
session_start();
include 'class/sementes.class.php';
include 'class/usuario.class.php';

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$sementes = new Sementes();
$usuarios = new Usuario();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Semente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .form-label {
            font-weight: bold;
            color: #495057;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="form-title">Adicionar Semente</h1>
        <form method="POST" action="adicionarSementeSubmit.php">
            <div class="mb-3">
                <label for="nome_semente" class="form-label">Nome Semente</label>
                <input type="text" class="form-control" id="nome_semente" name="nome_semente" placeholder="Digite nome da semente">
            </div>
            <div class="mb-3">
                <label for="dt_entrada" class="form-label">Data Entrada</label>
                <input type="date" class="form-control" id="dt_entrada" name="dt_entrada">
            </div>
            <div class="mb-3">
                <label for="dt_saida" class="form-label">Data Saída</label>
                <input type="date" class="form-control" id="dt_saida" name="dt_saida">
            </div>
            <div class="mb-3">
                <label for="tipo_semente" class="form-label">Tipo </label>
                <input type="text" class="form-control" id="tipo_semente" name="tipo_semente" placeholder="Digite o tipo da sua semente">
            </div>
            <div class="mb-3">
                <label for="fornecedor" class="form-label">Fornecedor</label>
                <input type="text" class="form-control" id="fornecedor" name="fornecedor" placeholder="Nome do Fornecedor">
            </div>
            <div class="form-group">
                <label for="foto_semente">Foto:</label>
                <input type="file" class="form-control" id="foto_semente" name="foto_semente" required>
            </div>
                <input type="submit" class="btn btn-custom" name="btCadastrar" value="ADICIONAR">
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>