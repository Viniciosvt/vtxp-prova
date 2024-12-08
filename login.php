<?php
session_start();
require 'class/usuario.class.php';

if (!empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    
    $usuarios = new Usuario();
    if ($usuarios->fazerLogin($email, $senha)) {
        header("Location: index.php");
        exit;
    } else {
        $erro = "Usuário e/ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link para o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f9f9f9;
        color: #333;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        margin-bottom: 20px;
    }
    .card-header {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
        border-bottom: none;
        padding: 15px;
        border-radius: 8px 8px 0 0;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        color: #fff;
        border-radius: 5px;
        padding: 8px 16px;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .form-control {
        background-color: #fff;
        color: #333;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        box-shadow: none;
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        border-color: #007bff;
        outline: none;
    }
    .alert {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        padding: 10px 15px;
        margin-bottom: 20px;
    }
</style>

</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h1>LOGIN</h1>
                    </div>
                    <div class="card-body">
                        <!-- Exibe mensagem de erro se houver -->
                        <?php if (isset($erro)): ?>
                            <div class="alert text-center">
                                <?= $erro; ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha:</label>
                                <input type="password" name="senha" id="senha" class="form-control" required>
                            </div>
                            <div class="mb-3 text-center">
                                <a href="esqueceuSenha.php" class="text-decoration-none">Esqueceu sua senha? Clique aqui</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link para o JS do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
