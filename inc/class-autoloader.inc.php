<?php

  // =============================================================================== //
  // ======================= CARREGAR CLASSE AUTOMATICAMENTE ======================= //

  spl_autoload_register('autoLoader');

  function autoLoader($class) {
    $path = "class/";
    $ext = ".class.php";
    $fpth = $path . $class . $ext;

    if (!file_exists($fpth)) {
      return false;
    }

    include_once $fpth;
  }