<?php

   // require_once "../DBConfig/DBConfig.php";
    require_once __DIR__.'/../DBConfig/DBConfig.php';

class Crud {

    private $db;

    function __construct() {
        $this->db = new DBConfig();
    }

    public function insert($query) {

        $nomeCompleto = $usuario->getNome();
        $tipoUtilizador = $usuario->getTipoUsuario();
        $email = $usuario->getEmail();
        $telemovel = $usuario->getTelemovel();
        $palavraPasse = $usuario->getSenhaLogin();
        $nomeLogin = $usuario->getNomeLogin();
        $estado = $usuario->getEstado();

        try {

            $dado = $this->db->conexao()->prepare("INSERT INTO tb_utilizador(nomeUtilizador, tipoUtilizador, email,"
                    . " telemovel, palavraPasse,loginUtilizador,estado) VALUES(:fnome, :ftipo, :femail, :fnumeroTelemovel, :fpalavraPasse, :flogin,:festado)");
            $dado->bindParam(":fnome", $nomeCompleto);
            $dado->bindParam(":ftipo", $tipoUtilizador);
            $dado->bindParam(":femail", $email);
            $dado->bindParam(":fnumeroTelemovel", $telemovel);
            $dado->bindParam(":fpalavraPasse", $palavraPasse);
            $dado->bindParam(":flogin", $nomeLogin);
            $dado->bindParam(":festado", $estado);

            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function update($usuario) {

        $id = $usuario->getId();
        $nomeCompleto = $usuario->getNome();
        $tipoUtilizador = $usuario->getTipoUsuario();
        $email = $usuario->getEmail();
        $telemovel = $usuario->getTelemovel();
        $palavraPasse = $usuario->getSenhaLogin();
        $nomeLogin = $usuario->getNomeLogin();

        try {

            $dado = $this->db->conexao()->prepare("UPDATE tb_utilizador SET nomeUtilizador = :fnome, tipoUtilizador = :ftipo email = :femail,"
                    . " telemovel = :fnumeroTelemovel, palavraPasse = :fpalavraPasse, loginUtilizador = :flogin,"
                    . " WHERE idUtilizador = :id");

            $dado->bindParam(":id", $id);
            $dado->bindParam(":fnome", $nomeCompleto);
            $dado->bindParam(":ftipo",$tipoUtilizador);
            $dado->bindParam(":femail", $email);
            $dado->bindParam(":fnumeroTelemovel", $telemovel);
            $dado->bindParam(":fpalavraPasse", $palavraPasse);
            $dado->bindParam(":flogin", $nomeLogin);

            $dado->execute();

            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    public function pegarUltimoId() {
        try{
            
        } catch (Exception $ex) {

        }
    }
    public function atualizarEstado($senha){
        try{
            $dado = $this->db->conexao()->prepare("UPDATE tb_utilizador SET estado = '1' WHERE palavraPasse = '$senha' ");
            //$dado->bindParam(":senha", $senha);
        } catch (Exception $ex) {
            return 'Erro '.$ex->getMessage();
        }
    }

    public function delete($usuario) {

        $id = $usuario->getId();

        try {
            $dado = $this->db->conexao()->prepare("DELETE FROM tb_utilizador WHERE idUtilizador=:id;");
            $dado->bindparam(":id", $id);
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    public function visualizarCliente() {

        try {
            $dado = $this->db->conexao()->prepare("SELECT idUtilizador, nomeUtilizador, email,"
                    . " telemovel, loginUtilizador FROM tb_utilizador"
                    . " WHERE tipoUtilizador='Administrativo' ORDER BY idUtilizador");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    /* Metodos adicionado para o envio de email */

    public function verDados() {
        try {
            $dado = $this->db->conexao()->prepare("SELECT idUtilizador, nomeUtilizador, email,"
                    . " telemovel, loginUtilizador FROM tb_utilizador"
                    . " WHERE tipoUtilizador='Cliente' ORDER BY idUtilizador");
            $dado->execute();
            return $dado->fetchAll();
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    public function getById($usuario) {
        try {
            $id = $usuario->getId();
            $dado->$this->db->conexao()->prepare("SELECT * FROM tb_utilizador WHERE idUtilizador=:id");
            $dado->bindparam(":id", $id);

            $dado->execute();
            return true;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function logar($usuario) {

        $palavraPasse = $usuario->getSenhaLogin();
        $nomeLogin = $usuario->getNomeLogin();
        
        try {
            $dado = $this->db->conexao()->prepare("SELECT * FROM tb_utilizador WHERE loginUtilizador = :login AND palavraPasse = :senha");
            $dado->bindparam(":login", $nomeLogin);
            $dado->bindparam(":senha", $palavraPasse);

            if($dado->execute()){
              
                 return $dado->fetch(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}