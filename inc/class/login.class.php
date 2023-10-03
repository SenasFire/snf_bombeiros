<?php
require_once "dbh.class.php";

class Login extends Dbh {

  // =============================================================================== //
  // ===================== Método getter pra pegarmo o usuário ===================== //
  protected function getUser($num_fibra, $pwd) {
    
    $sql = "SELECT usuarios_pwd FROM usuarios_socorristas 
            WHERE usuarios_num_fibra = ?";

    try {
      $stmt = $this->connect()->prepare($sql);

      if(!$stmt->execute(array($num_fibra))) {
        $stmt = null;
        header("Location: ../dist/index.php?error=stmt-failed");
        exit();
      }

      if($stmt->rowCount() == 0) {
        $stmt = null;
        header("Location: ../dist/index.php?error=user-not-found");
        exit();
      }
    } catch (PDOException $erro) {
      $stmt = null;
      exit("Erro na conexão:<br>".$erro->getMessage());
    }

    $pwdHash = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($pwdHash);
    $checkPwd = password_verify($pwd, $pwdHash[0]["usuarios_pwd"]);
    return $checkPwd;

    if($checkPwd == false) {
      $stmt= null;
      header("Location: ../dist/index.php?error=senha-incorreta");
      exit();
    } 
    elseif($checkPwd == true) {
      $sql = "SELECT * FROM usuarios_socorristas WHERE usuarios_id = ?
              OR usuarios_num_fibra = ? AND usuarios_pwd = ?";
      try {
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($num_fibra, $pwd))) {
          $stmt = null;
          header("Location: ../dist/index.php?error=stmt-failed");
          exit();
        }

        if($stmt->rowCount() == 0) {
          $stmt = null;
          header("Location: ../dist/index.php?error=user-not-found");
          exit();
        }
      } catch (PDOException $erro) {
        $stmt = null;
        exit("Erro na conexão:<br>".$erro->getMessage());
      }

      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
      session_start();

      $_SESSION['usuario_id'] = $user[0]["usuarios_id"];
      $_SESSION['usuario_username'] = $user[0]["usuarios_username"];
    }
  }
}