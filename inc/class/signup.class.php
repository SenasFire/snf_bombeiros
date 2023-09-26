<?php

  class Signup extends Dbh {

    protected function verificarUsuario($username, $num_fibra) {
      $this->connect()->prepare("SELECT users_username, users_numfibra FROM users");
    }
    
  }