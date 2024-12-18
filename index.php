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
$usuarios->setUsuario($_SESSION['logado']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Administração - Sementes</title>
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
        <h1 class="text-center mb-4">Administração de Sementes</h1>

        <!-- Dropdown de Ações -->
        <div class="dropdown mb-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Ações
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php if ($usuarios->temPermissoes('add')): ?>
                    <li><a class="dropdown-item" href="adicionarSemente.php">Adicionar Semente</a></li>
                <?php endif; ?>
                <?php if ($usuarios->temPermissoes('super')): ?>
                    <li><a class="dropdown-item" href="listarFornecedor.php">Gerenciar Fornecedor</a></li>
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
                        <th>Nome Semente</th>
                        <th>Data Entrada</th>
                        <th>Data Saída</th>
                        <th>Tipo da Semente</th>
                        <th>Fornecedor</th>
                        <th>Foto da Semente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $lista = $sementes->getFoto();
                    foreach ($lista as $item):
                    ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['nome_semente']; ?></td>
                            <td><?php echo $item['dt_entrada']; ?></td>
                            <td><?php echo $item['dt_saida']; ?></td>
                            <td><?php echo $item['tipo_semente']; ?></td>
                            <td><?php echo $item['fornecedor']; ?></td>
                            <td>
                                <img src="<?php echo !empty($item['foto_semente']) && file_exists('img/sementes/' . $item['foto_semente'])
                                                ? 'img/sementes/' . $item['foto_semente']
                                                : 'img/placeholder.jpg'; ?>"
                                    alt="Foto da Semente" width="100" height="100">
                            </td>
                            <td>
                                <?php if ($usuarios->temPermissoes('edit')): ?>
                                    <a href="editarSemente.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm btn-action">Editar</a>
                                <?php endif; ?>
                                <?php if ($usuarios->temPermissoes('del')): ?>
                                    <a href="excluirSemente.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir a semente <?php echo $item['nome_semente']; ?>?')" class="btn btn-danger btn-sm btn-action">Excluir</a>
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