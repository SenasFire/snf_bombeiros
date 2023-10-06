<?php

require_once "dbh.class.php";

class Usuario {
  private $id;
  private $username;
  private $num_fibra;
  private $cmdt_radio;
  private $cmdt_code;

  public function __construct($id, $username, $num_fibra, $cmdt_radio, $cmdt_code) {
    $this->id   = $id;
    $this->username   = $username;
    $this->num_fibra  = $num_fibra;
    $this->cmdt_radio = $cmdt_radio;
    $this->cmdt_code  = $cmdt_code;
  }

  public function getId() {
    return $this->id;
  }

  public function getNome() {
    return $this->username;
  }

  public function getFibra() {
    return $this->num_fibra;
  }

  public function getCmdt() {
    return $this->cmdt_radio;
  }

  public function getCmdtCode() {
    return $this->cmdt_code;
  }

}

class UsuarioDB extends Dbh {

  public function listarUsuarios() {
    $sql = "SELECT * FROM usuarios_socorristas";
    
    try {
      $stmt = $this->connect()->prepare($sql);

      // Se o execute retornar falso o código dentro do IF será executado --------- :
      if(!$stmt->execute()) {
        $stmt = null;
        header("Location: ../dist/cadastro.php?error=stmt-failed");
        exit();
      }
    } catch (PDOException $erro) {
      $stmt = null;
      exit("Erro na conexão:<br>".$erro->getMessage());
    }
    $usuarios = [];

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $usuario = new Usuario($row['usuarios_id'], $row['usuarios_username'], $row['usuarios_num_fibra'], $row['usuarios_e_cmdt'], $row['usuarios_cmdt_cod']);
      $usuarios[] = $usuario;
    }

    return $usuarios;
  }

}