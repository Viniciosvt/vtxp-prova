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

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $info = $sementes->buscar($id);

    if (!$info) {
        header("Location: /vtxp");
        exit;
    }
} else {
    header("Location: /vtxp");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_semente = $_POST['nome_semente'];
    $dt_entrada = $_POST['dt_entrada'];
    $dt_saida = $_POST['dt_saida'];
    $tipo_semente = $_POST['tipo_semente'];
    $fornecedor = $_POST['fornecedor'];
    $excluirFoto = isset($_POST['excluir_foto']) ? true : false;

    // Se o usuário escolheu excluir a foto, apaga o arquivo do servidor
    if ($excluirFoto) {
        $fotoPath = 'img/sementes/' . $info['foto_semente'];
        if (file_exists($fotoPath)) {
            unlink($fotoPath); // Deleta a foto do servidor
        }
        $fotoNome = null; // Remove a referência no banco
    } else {
        // Caso contrário, faz o upload de uma nova foto se o usuário enviou uma
        if (!empty($_FILES['foto_semente']['name'])) {
            $foto = $_FILES['foto_semente'];
            $fotoNome = md5(time() . rand(0, 9999)) . '.jpg';
            $fotoPath = 'img/sementes/' . $fotoNome;
        
            if (move_uploaded_file($foto['tmp_name'], $fotoPath)) {
                // Foto foi carregada com sucesso
            } else {
                $fotoNome = $info['foto_semente']; // Mantém a foto atual caso o upload falhe
            }
        } else {
            $fotoNome = $info['foto_semente']; // Mantém a foto atual se nenhuma nova for enviada
        }
    }

    // Atualiza os dados da semente, incluindo a foto
    $sementes->editar($nome_semente, $dt_entrada, $dt_saida, $tipo_semente, $fornecedor, $fotoNome, $id);

    header("Location: index.php");
    var_dump($_POST, $_FILES);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Semente</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Semente</h1>

    <form method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        <input type="hidden" name="id" value="<?= htmlspecialchars($info['id']); ?>">

        <div class="mb-3">
            <label for="nome_semente" class="form-label">Nome Semente</label>
            <input type="text" class="form-control" id="nome_semente" name="nome_semente" 
                   placeholder="Digite nome da semente" value="<?= htmlspecialchars($info['nome_semente']); ?>">
        </div>
        <div class="mb-3">
            <label for="dt_entrada" class="form-label">Data Entrada</label>
            <input type="date" class="form-control" id="dt_entrada" name="dt_entrada" 
                   value="<?= htmlspecialchars($info['dt_entrada']); ?>">
        </div>
        <div class="mb-3">
            <label for="dt_saida" class="form-label">Data Saída</label>
            <input type="date" class="form-control" id="dt_saida" name="dt_saida" 
                   value="<?= htmlspecialchars($info['dt_saida']); ?>">
        </div>
        <div class="mb-3">
            <label for="tipo_semente" class="form-label">Tipo </label>
            <input type="text" class="form-control" id="tipo_semente" name="tipo_semente" 
                   placeholder="Digite o tipo da sua semente" value="<?= htmlspecialchars($info['tipo_semente']); ?>">
        </div>
        <div class="mb-3">
            <label for="fornecedor" class="form-label">Fornecedor</label>
            <input type="text" class="form-control" id="fornecedor" name="fornecedor" 
                   placeholder="Nome do Fornecedor" value="<?= htmlspecialchars($info['fornecedor']); ?>">
        </div>

        <div class="form-group">
                <label for="foto_semente">Foto:</label>
                <input type="file" class="form-control" id="foto_semente" name="foto_semente">
                <img src="img/sementes/<?php echo $info['foto_semente']; ?>" alt="Foto atual" width="100"><br>
                <!-- Checkbox para excluir a foto -->
                <input type="checkbox" name="excluir_foto" value="1"> Excluir foto atual
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
