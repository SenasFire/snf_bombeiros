<!-- Importar este arquivo include para toda página que desejar exibir o footer com PHP -->
<link rel="stylesheet" href="../dist/output.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<nav class="navbar_cellphone flex px-5 py-2.5 lg:flex-row justify-between items-center w-full h-fit bg-vermelho">
  <header aria-labelledby="nav_title" class="flex flex-row justify-center items-center gap-2.5">
    <img src="../public/images/logo-noar.png" alt="">
    <h1 id="nav_title" class="font-poppins font-semibold text-white text-2xl">NOAR</h1>
  </header>
  <!-- MENU ICON / Criar uma imagem depois para não bugar o estado -->
  <button aria-controls="primary-navigation" aria-expanded="false" class="w-8 aspect-square bg-menu-icon-toggle bg-no-repeat z-50">
    <span class="sr-only" style="display:none">Menu</span>
  </button>
  <!-- Menu que abre após clicar no ícone -- TODO: -->
  <section class="menu_open hidden peer-hover:flex flex-col items-start gap-[5px] p-2.5 w-[232px] bg-white rounded-2xl">
    <div class="close flex justify-end items-center self-stretch">
      <a href="" class="no-underline text-vermelho font-poppins">Fechar</a>
      <!-- ICON FECHAR: -->
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <mask id="mask0_44_102" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
          <rect width="24" height="24" fill="#D9D9D9"/>
        </mask>
        <g mask="url(#mask0_44_102)">
          <path d="M6.4 19L5 17.6L10.6 12L5 6.4L6.4 5L12 10.6L17.6 5L19 6.4L13.4 12L19 17.6L17.6 19L12 13.4L6.4 19Z" fill="#C7402D"/>
        </g>
      </svg>
    </div>
    <ul class="navlinks flex flex-col justify-center items-start gap-2.5 self-stretch text-vermelho font-poppins">
      <li><a>Perfil</a></li>
      <li><a>Página Principal</a></li>
      <li><a>Histórico de Ocorrências</a></li>
      <li><a>Nova Ocorrência</a></li>
      <li><a>Ajuda</a></li>
    </ul>
  </section>
</nav>