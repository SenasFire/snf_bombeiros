<?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $num_fibra = $_POST["num_fibra"];
    $pwd = $_POST["pwd"];
  }
  else {
    header("Location: ../dist/cadastro.php");
  }