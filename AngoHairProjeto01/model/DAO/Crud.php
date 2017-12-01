<?php
     require_once __DIR__.'/../DBConfig/DBConfig.php';
class Crud {

    private $db;

    function __construct() {
        $this->db = new DBConfig();
    }

    public function update($query,$detetor) {

        switch ($detetor) {
            case 1:
                    $id = $usuario->getId();
                    $nomeCompleto = $usuario->getNome();
                    $tipoUtilizador = $usuario->getTipoUsuario();
                    $email = $usuario->getEmail();
                    $telemovel = $usuario->getTelemovel();
                    $palavraPasse = $usuario->getSenhaLogin();
                    $nomeLogin = $usuario->getNomeLogin();

                    try {

                        $dado = $this->db->conexao()->prepare("UPDATE tb_utilizador SET nomeUtilizador = :fnome, tipoUtilizador = :ftipo email = :femail,"
                                . " telemovel = :fnumeroTelemovel, palavraPasse = :fpalavraPasse,loginUtilizador = :flogin"
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
                break;
            case 2:
                    try {
                        $dado = $this->db->conexao()->prepare($query);
                        $dado->execute();
                        return true;
                    } catch (PDOException $ex) {
                        return 'Erro ' . $ex->getMessage();
                    }
                break;
            
            default:
                break;
        }

    }

    public function delete($id) {


        try {
            $dado = $this->db->conexao()->prepare("DELETE FROM tb_utilizador WHERE idUtilizador=:id;");
            $dado->bindparam(":id", $id);
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    public function listar($detetor) {

        switch ($detetor) {
            case 1:
                try {
                    $dado = $this->db->conexao()->prepare("SELECT idUtilizador, nomeUtilizador, email,"
                    . " telemovel FROM tb_utilizador"
                    . " WHERE tipoUtilizador='Registado' ORDER BY idUtilizador");
                    $dado->execute();
                    return $dado->fetchAll();

                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;
            
            case 2:
                try {
                    $dado = $this->db->conexao()->prepare("SELECT idUtilizador, nomeUtilizador, email,"
                    . " telemovel FROM tb_utilizador"
                    . " WHERE tipoUtilizador='Registado' AND estado='Activo' ORDER BY idUtilizador");
                    $dado->execute();
                    return $dado->fetchAll();

                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;
            
            case 3:
                try {
                    $dado = $this->db->conexao()->prepare("SELECT idUtilizador, nomeUtilizador, email,"
                    . " telemovel FROM tb_utilizador"
                    . " WHERE tipoUtilizador='Registado' AND estado='Bloqueado' ORDER BY idUtilizador");
                    $dado->execute();
                    return $dado->fetchAll();

                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;
            
            case 4:
                try {
                    $dado = $this->db->conexao()->prepare("SELECT idUtilizador, nomeUtilizador, email,"
                    . " telemovel FROM tb_utilizador"
                    . " WHERE tipoUtilizador='Administrativo' ORDER BY idUtilizador");
                    $dado->execute();
                    return $dado->fetchAll();

                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;
            
            default:
                echo '<div> Valor incorreto </div>';
                break;
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
    
    
    
    public function activarAdmin($usuario) {
                    $id = $usuario->getId();
                    try {

                        $dado = $this->db->conexao()->prepare("UPDATE tb_utilizador SET estado = 'Activo'"
                                . " WHERE idUtilizador = :id and tipoUtilizador='Administrativo'");
                        $dado->bindParam(":id", $id);
                        
                        $dado->execute();
                        return true;
                    } catch (PDOException $ex) {
                        echo $ex->getMessage();
                        return false;
                    }
  

}
}


