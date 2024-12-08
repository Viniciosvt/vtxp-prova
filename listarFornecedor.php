<?php
session_start();
include 'class/fornecedor.class.php';
include 'class/usuario.class.php';

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$fornecedor = new Fornecedor();
$usuarios = new Usuario();
$usuarios->setUsuario($_SESSION['logado']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Administração - Fornecedor</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .menu {
            margin-bottom: 20px;
        }

        .table-container {
            max-width: 100%;
            margin: auto;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        .btn-action {
            margin: 2px 0;
        }

        img {
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <h1 class="text-center mb-4">Administração de Fornecedor</h1>

        <!-- Dropdown de Ações -->
        <div class="dropdown mb-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Ações
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php if ($usuarios->temPermissoes('add')): ?>
                    <li><a class="dropdown-item" href="adicionarFornecedor.php">Adicionar Fornecedor</a></li>
                <?php endif; ?>
                <?php if ($usuarios->temPermissoes('super')): ?>
                    <li><a class="dropdown-item" href="listarUsuario.php">Gerenciar Usuários</a></li>
                <?php endif; ?>
                <li><a class="dropdown-item text-danger" href="sair.php">Sair</a></li>
            </ul>
        </div>

        <!-- Tabela de Contatos -->
        <div class="table-container">
            <table class="table table-striped table-bordered shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome Fornecedor</th>
                        <th>CPF/CNPJ</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Categorias</th>
                        <th>Email</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $lista = $fornecedor->getFoto();
                    foreach ($lista as $item):
                    ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['nome']; ?></td>
                            <td><?php echo $item['cpf_cnpj']; ?></td>
                            <td><?php echo $item['endereco']; ?></td>
                            <td><?php echo $item['telefone']; ?></td>
                            <td><?php echo $item['categorias']; ?></td>
                            <td>
                                <img src="<?php echo !empty($item['foto']) && file_exists('img/fornecedor/' . $item['foto'])
                                                ? 'img/fornecedor/' . $item['foto']
                                                : 'img/placeholder.jpg'; ?>"
                                    alt="Foto do fornecedor" width="100" height="100">
                            </td>
                            <td>
                                <?php if ($usuarios->temPermissoes('edit')): ?>
                                    <a href="editarFornecedor.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm btn-action">Editar</a>
                                <?php endif; ?>
                                <?php if ($usuarios->temPermissoes('del')): ?>
                                    <a href="excluirFornecedor.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir o fornecedor <?php echo $item['nome']; ?>?')" class="btn btn-danger btn-sm btn-action">Excluir</a>
                                <?php endif; ?>
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