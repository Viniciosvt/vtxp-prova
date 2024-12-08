<?php
require 'conexao.class.php';

class Sementes {
    private $id;
    private $nome_semente;
    private $dt_entrada;
    private $dt_saida;
    private $tipo_semente;
    private $fornecedor;
    private $foto_semente;

    private $con;

    public function __construct() {
        $this->con = new Conexao();
    }

    public function adicionar($nome_semente, $dt_entrada, $dt_saida, $tipo_semente, $fornecedor, $foto_semente) {
        try {
                $this->nome_semente = $nome_semente;
                $this->dt_entrada = $dt_entrada;
                $this->dt_saida = $dt_saida;
                $this->tipo_semente = $tipo_semente;
                $this->fornecedor = $fornecedor;
                $this->foto_semente = $foto_semente;

            $sql = $this->con->conectar()->prepare("INSERT INTO sementes(nome_semente, dt_entrada, dt_saida, tipo_semente, fornecedor, foto_semente) 
            VALUES (:nome_semente, :dt_entrada, :dt_saida, :tipo_semente, :fornecedor, :foto_semente)");
            $sql->bindParam(":nome_semente", $nome_semente);
            $sql->bindParam(":dt_entrada", $dt_entrada);
            $sql->bindParam(":dt_saida", $dt_saida);
            $sql->bindParam(":tipo_semente", $tipo_semente);
            $sql->bindParam(":fornecedor", $fornecedor);
            $sql->bindParam(":foto_semente", $foto_semente);

            $sql->execute();
            return true;
        } catch (PDOException $ex) {
            return 'ERRO: ' . $ex->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM sementes");
            $sql->execute();
            return $sql->fetchAll();
        } catch(PDOException $ex) {
            echo "ERRO: ". $ex->getMessage();
        }
    }

    public function buscar($id) {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM sementes WHERE id=:id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            return ($sql->rowCount() > 0) ? $sql->fetch() : array();
        } catch(PDOException $ex) {
            echo "ERRO: ".$ex->getMessage();
        }
    }

    public function getFoto() {
        $array = array();
        $sql = $this->con->conectar()->prepare("
            SELECT sementes.*, f.url 
            FROM sementes
            LEFT JOIN foto_semente f ON f.semente_id = sementes.id
        ");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function editar($nome_semente, $dt_entrada, $dt_saida, $tipo_semente, $fornecedor, $foto_semente, $id) {
        try {
            $sql = $this->con->conectar()->prepare("UPDATE sementes SET nome_semente = :nome_semente, dt_entrada = :dt_entrada, dt_saida = :dt_saida, tipo_semente = :tipo_semente, fornecedor = :fornecedor, foto_semente = :foto_semente WHERE id = :id");
            $sql->bindValue(':nome_semente', $nome_semente);
            $sql->bindValue(':dt_entrada', $dt_entrada);
            $sql->bindValue(':dt_saida', $dt_saida);
            $sql->bindValue(':tipo_semente', $tipo_semente);
            $sql->bindValue(':fornecedor', $fornecedor);
            $sql->bindValue(':foto_semente', $foto_semente);
            $sql->bindValue(':id', $id, PDO::PARAM_INT);

            $sql->execute();
            return true;
        } catch (PDOException $ex) {
            echo "ERRO: " . $ex->getMessage();
        }
    }

    public function deletar($id) {
        try {
            $sql = $this->con->conectar()->prepare("DELETE FROM sementes WHERE id = :id");
            $sql->bindValue(':id', $id, PDO::PARAM_INT);
            $sql->execute();
        } catch (PDOException $ex) {
            echo "ERRO: " . $ex->getMessage();
        }
    }
}
