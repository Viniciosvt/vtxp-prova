<?php

include 'class/sementes.class.php';
$sementes = new Sementes();

    $nome_semente = $_POST['nome_semente'];
    $dt_entrada = $_POST['dt_entrada'];
    $dt_saida = $_POST['dt_saida'];
    $tipo_semente = $_POST['tipo_semente'];
    $fornecedor = $_POST['fornecedor'];
    $foto_semente = $_POST['foto_semente'];
    $sementes->adicionar($nome_semente, $dt_entrada, $dt_saida, $tipo_semente, $fornecedor, $foto_semente);
    header('Location: index.php');
