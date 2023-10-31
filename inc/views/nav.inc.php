<!-- Importar este arquivo include para toda página que desejar exibir o footer com PHP -->
<link rel="stylesheet" href="../dist/output.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script src="nav_script.inc.js" defer></script>
<nav class="navbar_cellphone flex py-2.5 px-8 lg:flex-row justify-between items-center w-full h-fit bg-vermelho">
  <header aria-labelledby="nav_title" class="flex flex-row justify-center items-center gap-2.5">
  <img src="../public/images/logo-noar.png" alt="" class="w-10 h-10 md:h-32 md:w-32">
    <div aria-label="Título" class="flex flex-col">
      <h1 id="nav_title" class="font-poppins font-semibold text-white text-4xl">NOAR</h1>
      <p class="hidden laptop:block font-poppins text-2xl text-white font-medium">Núcleo de Operações Aéreas e Resgate</p>
    </div>
  </header>
  <!-- MENU ICON / Criar uma imagem depois para não bugar o estado -->
  <button onclick="expandirMenu()" id="menu-toggle" aria-controls="primary-navigation" class="desktop:hidden w-8 h-8 bg-menu-icon-toggle bg-no-repeat z-50">
    <span class="sr-only" style="display:none">Menu</span>
  </button>
  <!-- Menu que abre após clicar no ícone -- TODO: -->
  <section id="primary-navigation" class="menu_open hidden absolute top-0 right-0 border flex-col items-start gap-[5px] p-4 w-[232px] bg-white
    transition-transform
  ">
    <div class="close flex justify-end items-center self-stretch">
      <!-- ICON FECHAR: -->
      <p onclick="retrairMenu()" class="self-center text-vermelho font-poppins cursor-pointer">Fechar</p>
      <button onclick="retrairMenu()" id="nav-close" class="bg-close w-8 h-8 bg-no-repeat bg-center">
      </button>
    </div>
    <ul class="navlinks flex flex-col justify-center items-start gap-2.5 self-stretch text-vermelho font-poppins">
      <li><a href="perfil.html">Perfil</a></li>
      <li><a href="main.html">Página Principal</a></li>
      <li><a>Histórico de Ocorrências</a></li>
      <li><a>Nova Ocorrência</a></li>
      <li><a>Ajuda</a></li>
      <li><a>Acessibilidade</a></li>
    </ul>
  </section>
  <ul class="navlinks hidden desktop:flex flex-row text-white gap-12 items-center text-xl font-poppins">
    <li><a>Perfil</a></li>
    <li><a>Página Principal</a></li>
    <li><a>Histórico de Ocorrências</a></li>
    <li><a>Nova Ocorrência</a></li>
    <li><a>Ajuda</a></li>
    <li><img src="../public/images/pfp.svg" alt="Foto Perfil" aria-hidden="false" class=""></li>
  </ul>
</nav>