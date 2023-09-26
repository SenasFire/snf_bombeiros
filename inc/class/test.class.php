<?php

class Test extends Dbh {

  public function getUser() {
    $sql = "SELECT * FROM users";
    $stmt = $this->connect()->query($sql);
    // Como eu defini as opções de FETCH ASSOC não preciso colocar aqui:
    while($row = $stmt->fetch()) {
      echo $row['username']             . '<br>';
      echo $row['pwd']                  . '<br>';
      echo $row['user_data_nascimento'] . '<br>';
    }
  }

}