<?php

class signupController {
  private $username;
  private $num_fibra;
  private $pwd;
  private $cmdt_radio;
  private $cmdt_code;

  public function __construct($username, $num_fibra, $pwd, $cmdt_radio, $cmdt_code) {
    $this->username = $username;
    $this->num_fibra = $num_fibra;
    $this->pwd = $pwd;
    $this->cmdt_radio = $cmdt_radio;
    $this->cmdt_code = $cmdt_code;
  }

  // =============================================================================== //
  // ======== Se os inputs estiverem vazios alterar estado para exibir erro ======== //
  public function isInputEmpty() {
    if (empty($this->username) || empty($this->num_fibra) || empty($this->pwd) || (!isset($this->cmdt_radio)) || $this->cmdt_radio === "sim" && empty($this->cmdt_code)) {
      $result = false;
    }
    else {
      $result = true;
    }
    return $result;
  }
}