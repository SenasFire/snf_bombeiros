<?php

class signupController extends Signup {
  private $username;
  private $num_fibra;
  private $pwd;
  private $cmdt_radio;
  private $cmdt_code;

  public function __construct($username, $num_fibra, $pwd, $cmdt_radio, $cmdt_code) {
    $this->username   = $username;
    $this->num_fibra  = $num_fibra;
    $this->pwd        = $pwd;
    $this->cmdt_radio = $cmdt_radio;
    $this->cmdt_code  = $cmdt_code;
  }

  public function signupUser() {

    if ($this->isInputEmpty() == true) {
      // Input vazio!
      header("Location: ../dist/cadastro.php?error=empty-input");
      exit();
    }
    if ($this->checkNumFibra($this->num_fibra, $this->cmdt_code) == true) {
      // Código já tomado!
      header("Location: ../dist/cadastro.php?error=num-fibra-taken");
      exit();
    }  
    if ($this->setUser($this->username, $this->num_fibra, $this->pwd, $this->cmdt_radio, $this->cmdt_code) == true) {
      header("Location: ../dist/cadastro.php?success=usuario-cadastrado");
      exit();
    }
  }

  // =============================================================================== //
  // ======== Se os inputs estiverem vazios alterar estado para exibir erro ======== //
  private function isInputEmpty() {

    if (empty($this->username) || empty($this->num_fibra) || empty($this->pwd) || (!isset($this->cmdt_radio)) || $this->cmdt_radio === "sim" && empty($this->cmdt_code)) {
      $result = true;
    } else {  
      $result = false;
    }
    return $result;
  }

  // =============================================================================== //
  // ========= Verificar se o código número fibra é repetido, já foi usado ========= //
  private function checkNumFibra() {

    if ($this->isCodeTaken($this->num_fibra, $this->cmdt_code)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

}