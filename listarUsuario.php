<?php
session_start();
include 'class/contatos.class.php';
include 'class/usuario.class.php';

if(!isset($_SESSION['logado'])){
    header("Location: login.php");
    exit;
}

$contato = new Contatos();
$usuario = new Usuario();
$usuario->setUsuario($_SESSION['logado']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Página de Administração - Usuários</title>
    <style>
    body {
        background-color: #f5f5f5; 
        font-family: Arial, sans-serif; 
    }
    .menu {
        margin-bottom: 20px;
    }
    .table-container {
        max-width: 100%;
        margin: auto;
        background-color: #ffffff; 
        border-radius: 8px; /* Borda  arredondada */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }
    table {
        width: 100%;
        border-collapse: collapse; /* Remove bordas duplicadas */
    }
    th, td {
        text-align: center;
        padding: 10px; 
    }
    th {
        background-color: #007bff; 
        color: white;
        font-weight: bold;
    }
    td {
        background-color: #f9f9f9; 
    }
    tr:nth-child(even) td {
        background-color: #ffffff; 
    }
    tr:hover td {
        background-color: #e9f5ff; 
    }
    .btn-action {
        margin: 2px;
        padding: 5px 10px; /* Botões mais compactos */
        border-radius: 5px;
        font-size: 0.9rem;
    }
    .btn-action:hover {
        opacity: 0.9;
    }
    img {
        border-radius: 50%; 
        max-width: 50px; 
        max-height: 50px;
    }
    h1 {
        text-align: center;
        color: #333333; 
        font-weight: 600;
    }
</style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-3">Administração de Usuários</h1>
        
        <!-- Dropdown de Ações -->
        <div class="dropdown mb-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Ações
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php if ($usuario->temPermissoes('add')): ?>
                    <li><a class="dropdown-item" href="adicionarUsuario.php">Adicionar Usuário</a></li>
                <?php endif; ?>
                <li><a class="dropdown-item text-danger" href="sair.php">Sair</a></li>
            </ul>
        </div>

        <!-- Tabela de usuários -->
        <div class="table-container">
            <table class="table table-striped table-bordered table-hover shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>SENHA</th>
                        <th>PERMISSÕES</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $lista = $usuario->listar();
                    foreach($lista as $item):
                    ?>
                    <tr>
                        <td><?php echo $item['nome']; ?></td>
                        <td><?php echo $item['email']; ?></td>
                        <td><?php echo '******'; // Esconde a senha ?></td>
                        <td><?php echo $item['permissoes']; ?></td>
                        <td>
                            <a href="editarUsuario.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm btn-action">EDITAR</a>
                            <a href="excluirUsuario.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir o usuário <?php echo $item['nome']; ?>?')" class="btn btn-danger btn-sm btn-action">EXCLUIR</a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
