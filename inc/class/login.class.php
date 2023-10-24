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
        header("Location: ../dist/login.php?error=stmt-failed");
        exit();
      }

      if($stmt->rowCount() == 0) {
        $stmt = null;
        header("Location: ../dist/login.php?error=user-not-found");
        exit();
      }

      $pwdHash = $stmt->fetch(PDO::FETCH_ASSOC);
      $checkPwd = password_verify($pwd, $pwdHash["usuarios_pwd"]);

    } catch (PDOException $erro) {
      $stmt = null;
      exit("Erro na conexão:<br>".$erro->getMessage());
    }

    if($checkPwd == false) {
      $stmt= null;
      header("Location: ../dist/login.php?error=senha-incorreta");
      exit();
    } 
    elseif($checkPwd == true) {
      $sql = "SELECT * FROM usuarios_socorristas WHERE
              usuarios_num_fibra = ?";
      try {
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($num_fibra))) {
          $stmt = null;
          header("Location: ../dist/login.php?error=stmt-failed");
          exit();
        }

        if($stmt->rowCount() == 0) {
          $stmt = null;
          header("Location: ../dist/login.php?error=user-not-found");
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

      if($user[0]["usuarios_e_cmdt"] == "Sim") {
        header("Location: ../dist/adm/main_admin.php?sucess=login-admin-completo"." usuario=".$user[0]["usuarios_username"]);
        exit();
      } else {
        header("Location: ../dist/adm/main_socorrista.php?sucess=login-admin-completo"." usuario=".$user[0]["usuarios_username"]);
      }
    }
  }
}