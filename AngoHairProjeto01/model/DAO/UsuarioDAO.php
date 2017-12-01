<?php

require_once __DIR__ . '/../DBConfig/DBConfig.php';

class UsuarioDAO {

    private $db;

    function __construct() {
        $this->db = new DBConfig();
    }

    public function insert($usuario) {
        $nomeCompleto = $usuario->getNome();
        $tipoUtilizador = $usuario->getTipoUsuario();
        $email = $usuario->getEmail();
        $telemovel = $usuario->getTelemovel();
        $palavraPasse = $usuario->getSenhaLogin();
        $nomeLogin = $usuario->getNomeLogin();
        $estado = $usuario->getEstado();

        try {

            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoInserirUtlizador(:fnome,:ftipo, :femail, :fnumeroTelemovel, :fpalavraPasse, :flogin, :festado);");
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

        $nomeCompleto = $usuario->getNome();
        $tipoUtilizador = $usuario->getTipoUsuario();
        $email = $usuario->getEmail();
        $telemovel = $usuario->getTelemovel();
        $palavraPasse = $usuario->getSenhaLogin();
        $nomeLogin = $usuario->getNomeLogin();

        try {

            $dado = $this->db->conexao()->prepare("UPDATE tb_utilizador SET nomeUtilizador = :fnome, tipoUtilizador = :ftipo, email = :femail,"
                    . " telemovel = :fnumeroTelemovel, palavraPasse = :fpalavraPasse, loginUtilizador = :flogin "
                    . " WHERE loginUtilizador = :flogin");

            $dado->bindParam(":fnome", $nomeCompleto);
            $dado->bindParam(":ftipo", $tipoUtilizador);
            $dado->bindParam(":femail", $email);
            $dado->bindParam(":fnumeroTelemovel", $telemovel);
            $dado->bindParam(":fpalavraPasse", $palavraPasse);
            $dado->bindParam(":flogin", $nomeLogin);
            $dado->bindParam(":flogin", $nomeLogin);

            return $dado->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function updateAdmin($usuario) {

        $nomeCompleto = $usuario->getNome();
        $tipoUtilizador = $usuario->getTipoUsuario();
        $email = $usuario->getEmail();
        $telemovel = $usuario->getTelemovel();
        $palavraPasse = $usuario->getSenhaLogin();
        $nomeLogin = $usuario->getNomeLogin();
        $estado = $usuario->getEstado();

        try {

            $dado = $this->db->conexao()->prepare("UPDATE tb_utilizador SET nomeUtilizador = :fnome, tipoUtilizador = :ftipo, email = :femail,"
                    . " telemovel = :fnumeroTelemovel, palavraPasse = :fpalavraPasse, loginUtilizador = :flogin,estado = :festado  "
                    . " WHERE loginUtilizador = :flogin");

            $dado->bindParam(":fnome", $nomeCompleto);
            $dado->bindParam(":ftipo", $tipoUtilizador);
            $dado->bindParam(":femail", $email);
            $dado->bindParam(":fnumeroTelemovel", $telemovel);
            $dado->bindParam(":fpalavraPasse", $palavraPasse);
            $dado->bindParam(":flogin", $nomeLogin);
            $dado->bindParam(":festado", $estado);

            return $dado->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function delete($usuario) {

        $id = $usuario->getId();

        try {

            $dado = $this->db->conexao()->prepare("call bd_angohairs.procedimentoEliminarUtilizador(:id);");
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
                    $dado = $this->db->conexao()->prepare("SELECT * FROM viewVisualizarUtilizador WHERE tipoUtilizador='Cliente' ORDER BY idUtilizador");
                    $dado->execute();
                    return $dado->fetchAll();
                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;

            case 2:
                try {
                    $dado = $this->db->conexao()->prepare("SELECT * FROM viewVisualizarUtilizador"
                            . " WHERE tipoUtilizador='Cliente' AND estado='Activo' ORDER BY idUtilizador");
                    $dado->execute();
                    return $dado->fetchAll();
                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;

            case 3:
                try {
                    $dado = $this->db->conexao()->prepare("SELECT * FROM viewVisualizarUtilizador"
                            . " WHERE tipoUtilizador='Cliente' AND estado='Bloqueado' ORDER BY idUtilizador");
                    $dado->execute();
                    return $dado->fetchAll();
                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;

            case 4:
                try {
                    $dado = $this->db->conexao()->prepare("SELECT * FROM viewVisualizarUtilizador WHERE tipoUtilizador='Administrativo'");
                    $dado->execute();
                    return $dado->fetchAll();
                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;
            case 5:
                try {
                    $dado = $this->db->conexao()->prepare("SELECT COUNT(*) as contarAdmin FROM viewVisualizarUtilizador"
                            . " WHERE tipoUtilizador='Cliente' AND estado='Bloqueado' ;");
                    return $dado->execute();
                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;
            case 6:
                try {
                    $dado = $this->db->conexao()->prepare("SELECT COUNT(*) FROM viewVisualizarUtilizador"
                            . " WHERE tipoUtilizador='Cliente' AND estado='Activo' ;");

                    return $dado->execute();
                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;
            case 7:
                try {
                    $dado = $this->db->conexao()->prepare("SELECT COUNT(*) FROM viewVisualizarUtilizador"
                            . " WHERE tipoUtilizador='Administrativo' ");
                    return $dado->execute();
                } catch (Exception $ex) {
                    return 'Erro ' . $ex->getMessage();
                }
                break;
            default:
                echo '<div> Valor incorreto </div>';
                break;
        }
    }

    public function getById($user) {
        try {
            $id = $user;
            $dado = $this->db->conexao()->prepare("SELECT * FROM viewVisualizarUtilizador WHERE idUtilizador=:id");
            $dado->bindparam(":id", $id);
            if ($dado->execute()) {
                return $dado->fetch(PDO:: FETCH_ASSOC);
            } else {

                return false;
            }
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

    public function visualizarContasActivadas() {
        try {
            $dado = $this->db->conexao()->prepare("SELECT count(nomeUtilizador) FROM viewVisualizarUtilizador where tipoUtilizador='Cliente' and estado='Activo' ");
            $dado->execute();
            return $dado->fetchAll();
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    public function visualizarContasBloqueadas() {

        try {
            $dado = $this->db->conexao()->prepare("SELECT count(nomeUtilizador) as contador FROM viewVisualizarUtilizador where tipoUtilizador='Cliente' and estado='Bloqueado'  ");
            $dado->execute();
            return $dado->fetchAll();
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    public function activarContaCliente($usuario) {
        $idUser = $usuario->getId();

        try {
            $dado = $this->db->conexao()->prepare("UPDATE tb_utilizador SET estado='Activo' WHERE idUtilizador = :id");
            $dado->bindparam(":id", $idUser);
            $dado->execute();
            return $dado->fetchAll();
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    public function bloquearContaCliente($usuario) {
        $idUser = $usuario->getId();

        try {
            $dado = $this->db->conexao()->prepare("UPDATE tb_utilizador SET estado='Bloqueado' WHERE idUtilizador = :id");
            $dado->bindparam(":id", $idUser);
            $dado->execute();
            return $dado->fetchAll();
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    public function logar($usuario) {

        $palavraPasse = $usuario->getSenhaLogin();
        $nomeLogin = $usuario->getNomeLogin();

        try {
            $dado = $this->db->conexao()->prepare("SELECT * FROM viewVisualizarUtilizador WHERE loginUtilizador = :login AND palavraPasse = :senha");
            $dado->bindparam(":login", $nomeLogin);
            $dado->bindparam(":senha", $palavraPasse);

            if ($dado->execute()) {

                return $dado->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}
