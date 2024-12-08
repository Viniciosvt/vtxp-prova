<?php
require 'conexao.class.php';
class Fornecedor{
    private $id;
    private $nome;
    private $cpf_cnpj;
    private $endereco;
    private $telefone;
    private $categorias;
    private $email;
    private $foto;

    private $con;

    public function __construct() {
        $this->con = new Conexao();
    }
    private function existeEmail($email){
        $sql = $this->con->conectar()->prepare("SELECT id FROM fornecedor WHERE email = :email");
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        else{
            $array = array();
        }
        return $array;

    }
    public function adicionar($email, $nome, $cpf_cnpj, $endereco, $telefone, $categorias, $foto){
        $emailExistente = $this->existeEmail($email);
        if(count($emailExistente) == 0){
            try{
                $this->nome = $nome;
                $this->cpf_cnpj = $cpf_cnpj;
                $this->endereco = $endereco;
                $this->telefone = $telefone;
                $this->categorias = $categorias;
                $this->email = $email;
                $this->foto = $foto;
                $sql = $this->con->conectar()->prepare("INSERT INTO fornecedor(nome, cpf_cnpj, endereco, telefone, categorias, email, foto) VALUES (:nome, :cpf_cnpj, :endereco, :telefone, :categorias, :email, :foto)");
                $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $sql->bindParam(":cpf_cnpj", $this->cpf_cnpj, PDO::PARAM_STR);
                $sql->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                $sql->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                $sql->bindParam(":categorias", $this->categorias, PDO::PARAM_STR);
                $sql->bindParam(":email", $this->email, PDO::PARAM_STR);
                $sql->bindParam(":foto", $this->foto, PDO::PARAM_STR);
                $sql->execute();
                
                return TRUE;

            }
            catch(PDOException $ex){
                return 'ERRO: '.$ex->getMessage();
            }
        }
        else{
            return FALSE;
        }
    }
    public function listar(){
        try{
            $sql = $this->con->conectar()->prepare("SELECT * FROM fornecedor");
            $sql->execute();
            return $sql->fetchALL();

        }catch(PDOException $ex){
            echo "ERRO: ". $ex->getMessage();
        }
    }
    public function  buscar($id){
        try{
            $sql = $this->con->conectar()->prepare("SELECT * FROM fornecedor WHERE id=:id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                return $sql->fetch();
            }else{
                return array();
            }

        }catch(PDOException $ex){
            echo "ERRO: ".$ex->getMessage();
        }

    }
    public function getFoto() {
        $array = array();
        $sql = $this->con->conectar()->prepare("
            SELECT fornecedor.*, f.url 
            FROM fornecedor
            LEFT JOIN foto_forncedor f ON f.fornecedor_id = fornecedor.id
        ");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function editar($nome, $cpf_cnpj, $endereco, $telefone, $categorias, $email, $foto, $id) {
        try {
            $sql = $this->con->conectar()->prepare("UPDATE fornecedor SET nome = :nome, cpf_cnpj = :cpf_cnpj, endereco = :endereco, telefone = :telefone, categorias = :categorias, email = :email, foto = :foto WHERE id = :id");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':cpf_cnpj', $cpf_cnpj);
            $sql->bindValue(':endereco', $endereco);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':categorias', $categorias);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':foto', $foto);
            $sql->bindValue(':id', $id, PDO::PARAM_INT);

            $sql->execute();
            return true;
        } catch (PDOException $ex) {
            echo "ERRO: " . $ex->getMessage();
        }
    }
    
    public function deletar($id){

        $sql = $this->con->conectar()->prepare("DELETE FROM fornecedor WHERE id= :id");
        $sql->bindValue(':id', $id);
        $sql->execute(); 

    }      
}