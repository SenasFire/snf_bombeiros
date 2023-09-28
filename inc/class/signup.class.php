<?php
class Signup extends Dbh {

  // =============================================================================== //
  // ===================== Método setter pra inserir o usuário ===================== //
  protected function setUser($username, $num_fibra, $pwd, $cmdt_radio, $cmdt_code) {
    
    $sql = "INSERT INTO usuarios_socorristas 
            (usuarios_username, usuarios_pwd, usuarios_num_fibra, usuarios_e_cmdt, usuarios_cmdt_cod)
            VALUES (?, ?, ?, ?, ?)";
    $hashPwd = password_hash($pwd, PASSWORD_BCRYPT);

    try {
      $stmt = $this->connect()->prepare($sql);

      if(!$stmt->execute(array($username, $num_fibra, $hashPwd, $cmdt_radio, $cmdt_code))) {
        $stmt = null;
        header("Location: ../dist/cadastro.php?error=stmt-failed");
        exit();
      }
    } catch (PDOException $erro) {
      $stmt = null;
      exit("Erro na conexão:<br>".$erro->getMessage());
    }
  }

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