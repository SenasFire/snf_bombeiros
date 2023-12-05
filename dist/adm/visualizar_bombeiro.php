<?php
  session_start();
  $id_usuario = $_SESSION['usuario_id'];

  if(!isset($id_usuario)) {
    header("Location: ../login.php?error=invalid-access");
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="Website Icon" type="png" href="../../public/images/logo-noar.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../output.css">
  <script src="../../inc/js/nav_script.inc.js" defer></script>
  <script src="../../inc/js/crud_adm.inc.js" defer></script>
  <script type="text/javascript" src="../../jquery-1.8.2.min.js"></script>

  <title>Visualizar Usuário</title>
</head>

<body>
  <?php include("../../inc/views/nav-admin.inc.php"); ?>
  <?php include("../../inc/views/visualizar-bombeiro-conteudo.inc.php"); ?>
  <?php include("../../inc/views/footer-adm.inc.php") ?>
</body>
</html>