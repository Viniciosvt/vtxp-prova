<?php

include 'class/fornecedor.class.php';
$fornecedor = new Fornecedor();

if(!empty($_POST['email'])){
    $nome = $_POST['nome'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $categorias = $_POST['categorias'];
    $email = $_POST['email'];
    $foto = $_POST['foto'];
    $fornecedor->adicionar($nome, $cpf_cnpj, $endereco, $telefone, $categorias, $email, $foto);
    header('Location: listarFornecedor.php');
}
else{
    echo '<script type="text/javascript">Alert(Email já cadastrado)"</script>';
}