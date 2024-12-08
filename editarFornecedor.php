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


    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $info = $fornecedor->buscar($id);
    
        if (!$info) {
            header("Location: /vtxp");
            exit;
        }
    } else {
        header("Location: /vtxp");
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $cpf_cnpj = $_POST['cpf_cnpj'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $categorias = $_POST['categorias'];
        $email = $_POST['email'];
        $excluirFoto = isset($_POST['excluir_foto']) ? true : false;
    
        // Se o usuário escolheu excluir a foto, apaga o arquivo do servidor
        if ($excluirFoto) {
            $fotoPath = 'img/fornecedor/' . $info['foto'];
            if (file_exists($fotoPath)) {
                unlink($fotoPath); // Deleta a foto do servidor
            }
            $fotoNome = null; // Remove a referência no banco
        } else {
            // Caso contrário, faz o upload de uma nova foto se o usuário enviou uma
            if (!empty($_FILES['foto']['name'])) {
                $foto = $_FILES['foto'];
                $fotoNome = md5(time() . rand(0, 9999)) . '.jpg';
                $fotoPath = 'img/fornecedor/' . $fotoNome;
            
                if (move_uploaded_file($foto['tmp_name'], $fotoPath)) {
                    // Foto foi carregada com sucesso
                } else {
                    $fotoNome = $info['foto']; // Mantém a foto atual caso o upload falhe
                }
            } else {
                $fotoNome = $info['foto']; // Mantém a foto atual se nenhuma nova for enviada
            }
        }
    
        // Atualiza os dados da semente, incluindo a foto
        $fornecedor->editar($nome, $cpf_cnpj, $endereco, $telefone, $categorias, $email, $fotoNome, $id);
    
        header("Location: listarFornecedor.php");
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
    <title>Editar Fornecedor</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Fornecedor</h1>

    <form method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        <input type="hidden" name="id" value="<?php echo $info['id']; ?>">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome ou Razão Social </label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite nome da semente"  value="<?= htmlspecialchars($info['nome']); ?>">
        </div>
        <div class="mb-3">
            <label for="cpf_cnpj" class="form-label">CPF ou CNPJ</label>
            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder="Digite o CPF ou CNPJ"  value="<?= htmlspecialchars($info['cpf_cnpj']); ?>">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço"  value="<?= htmlspecialchars($info['endereco']); ?>">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite telefone de contato"  value="<?= htmlspecialchars($info['telefone']); ?>">
        </div>
        <div class="mb-3">
            <label for="categorias" class="form-label">Categorias</label>
            <input type="text" class="form-control" id="categorias" name="categorias" placeholder="Tipos de sementes fornecidas."  value="<?= htmlspecialchars($info['categorias']); ?>"> 
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail"  value="<?= htmlspecialchars($info['email']); ?>">
        </div>

        <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto">
                <img src="img/fornecedor/<?php echo $info['foto']; ?>" alt="Foto atual" width="100"><br>
                <!-- Checkbox para excluir a foto -->
                <input type="checkbox" name="excluir_foto" value="1"> Excluir foto atual
            </div>
        </div>

        <div class="d-grid">
            <input type="submit" name="btAlterar" value="Alterar" class="btn btn-primary btn-lg">
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>