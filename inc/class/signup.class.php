<?php
class Signup extends Dbh {

  // =============================================================================== //
  // ===================== Método setter pra inserir o usuário ===================== //
  protected function setUser($username, $num_fibra, $pwd, $cmdt_radio, $cmdt_code) {
    
    $sql = "INSERT INTO usuarios_socorristas 
            (usuarios_username, usuarios_pwd, usuarios_num_fibra, usuarios_e_cmdt, usuarios_cmdt_cod)
            VALUES (?, ?, ?, ?, ?)";
    $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

    try {
      $stmt = $this->connect()->prepare($sql);

      // Se o execute retornar falso o código dentro do IF será executado --------- :
      if(!$stmt->execute(array($username, $hashPwd, $num_fibra, $cmdt_radio, $cmdt_code))) {
        $stmt = null;
        header("Location: ../dist/cadastro.php?error=stmt-failed");
        exit();
      } else {
        header("Location: ../dist/cadastro.php?succes=usuario-cadastrado");
      }
    } catch (PDOException $erro) {
      $stmt = null;
      exit("Erro na conexão:<br>".$erro->getMessage());
    }
  }

  // OBS: método acima não precisa de bindParam pois estou passando os valores diretamente
  // Na mesma ordem da consulta SQL ______________________________________________________

  // =============================================================================== //
  // ======== Verificar se o número fibra já foi utilizado para não repetir ======== //
  protected function isCodeTaken($num_fibra, $cmdt_code) {
    
    $sql = "SELECT * FROM usuarios_socorristas WHERE usuarios_num_fibra = :num_fibra OR usuarios_cmdt_cod = :cmdt_code";

    try {
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindParam(":num_fibra", $num_fibra);
      $stmt->bindParam(":cmdt_code", $cmdt_code);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        $result = true;
        $stmt = null;
      } 
      else {
        $result = false;
        $stmt = null;
      }

      return $result; 
    }
    catch (PDOException $erro) {
      $stmt = null;
      header("Location: ../dist/cadastro.php?erro=stmt-failed");
      exit("Erro na conexão:<br>".$erro->getMessage());
    }
  }

}