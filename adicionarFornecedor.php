<?php
session_start();
    include 'class/fornecedor.class.php';
    include 'class/usuario.class.php';

    if(!isset($_SESSION['logado'])){
        header("Location: login.php");
        exit;
    }

    $fornecedor = new Fornecedor();
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
    <h1 class="form-title">Adicionar Fornecedor</h1>
    <form method="POST" action="adicionarFornecedorSubmit.php">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome ou Razão Social </label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite nome da semente">
        </div>
        <div class="mb-3">
            <label for="cpf_cnpj" class="form-label">CPF ou CNPJ</label>
            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder="Digite o CPF ou CNPJ">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite telefone de contato">
        </div>
        <div class="mb-3">
            <label for="categorias" class="form-label">Categorias</label>
            <input type="text" class="form-control" id="categorias" name="categorias" placeholder="Tipos de sementes fornecidas.">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto do Fornecedor</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="URL da foto do fornecedor">
        </div>
        <div class="d-grid">
            <input type="submit" class="btn btn-custom" name="btCadastrar" value="ADICIONAR">
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
