<?php
  session_start();
  $id_usuario = $_SESSION['usuario_id'];

  if(!isset($id_usuario)) {
    header("Location: ../login.php?error=invalid-access");
  }
?>