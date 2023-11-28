<?php
  include("class/dbh.class.php");
  include("class/usuario-db.class.php");
  include("class/login.class.php");
  $dbh = new Dbh();

$id = $_GET["id"];
$sql = "DELETE FROM alertas_e_noticias WHERE noticia_id = '$id'";
$stmt = $dbh->connect()->prepare($sql);
$stmt->execute();

header("Location: ../dist/adm/main_admin.php");