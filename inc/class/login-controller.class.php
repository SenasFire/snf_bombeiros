<?php

class loginController extends Login {
  private $num_fibra;
  private $pwd;

  public function __construct($num_fibra, $pwd) {
    $this->num_fibra  = $num_fibra;
    $this->pwd        = $pwd;
  }

  public function loginUser() {

    if ($this->isInputEmpty() == true) {
      // Input vazio!
      header("Location: ../dist/index.php?error=empty-input");
      exit();
    }

    $this->getUser($this->num_fibra, $this->pwd);
  }

  // =============================================================================== //
  // ======== Se os inputs estiverem vazios alterar estado para exibir erro ======== //
  private function isInputEmpty() {

    if (empty($this->num_fibra) || empty($this->pwd)) {
      $result = true;
    } else {  
      $result = false;
    }
    return $result;
  }

}