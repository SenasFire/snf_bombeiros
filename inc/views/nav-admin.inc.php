<nav class="navbar flex py-2.5 px-16 lg:flex-row justify-between items-center w-full bg-vermelho">

  <header aria-labelledby="nav_title" class="flex flex-row justify-center items-center gap-2.5">
    <img src="../../public/images/logo-noar.png" alt="">
    <div aria-label="Título" class="flex flex-col">
      <h1 id="nav_title" class="font-poppins text-4xl font-semibold text-white">NOAR</h1>
      <p
        class="hidden laptop:block 
        font-poppins text-2xl font-medium text-white">Núcleo de Operações Aéreas e Resgate</p>
    </div>
  </header>

  <button class="desktop:hidden w-8 h-8 z-50
                bg-menu-icon-toggle bg-no-repeat" onclick="expandirMenu()" id="menu-toggle" aria-controls="primary-navigation">
    <span class="sr-only" style="display:none">Menu</span>
  </button>
  
  <section id="primary-navigation" 
    class="menu_open hidden z-10 absolute top-0 right-0 gap-[5px] p-4 w-[232px]
    flex-col items-start 
    bg-white drop-shadow-lg
    transition-transform
  ">
    <div class="close flex justify-end items-center self-stretch">
      <p onclick="retrairMenu()" class="self-center text-vermelho font-poppins cursor-pointer">Fechar</p>
      <button onclick="retrairMenu()" id="nav-close" class="nav-close bg-close w-8 h-8 bg-no-repeat bg-center">
      </button>
    </div>
    <ul class="navlinks flex flex-col justify-center items-start gap-2.5 self-stretch text-vermelho font-poppins">
      <li><a class="cursor-pointer">Perfil</a></li>
      <li><a class="cursor-pointer">Página Principal</a></li>
      <li><a onclick="abrirCadastro();" class="flex flex-row gap-2.5 justify-center items-center">Novo Cadastro<img src="../../public/images/caret-right.svg" alt="Seta Para Baixo"></a></li>
      <li><a onclick="abrirVisualizar();" class="flex flex-row gap-2.5 justify-center items-center">Visualizar<img src="../../public/images/caret-right.svg" alt="Seta Para Baixo"></a></li>
      <li><a class="cursor-pointer">Ajuda</a></li>
      <li><a class="cursor-pointer">Acessibilidade</a></li>
    </ul>
  </section>

  <ul class="navlinks hidden desktop:flex flex-row text-white gap-12 items-center text-xl font-poppins h-full">
    <li>
      <a class="cursor-pointer hover:text-indigo-300 transition-colors duration-300" href="perfil.php">Perfil</a>
    </li>
    <li>
      <a class="cursor-pointer hover:text-indigo-300 transition-colors duration-300" href="main_admin.php">Página Principal</a>
    </li>

    <!-- Lista Dropdown: -->
    <li class="group flex flex-col items-center">
      <a class="flex flex-row gap-2.5 justify-center items-center cursor-pointer" href="cadastrar_admin.php" onclick="abrirCadastro();">
        Novo Cadastro<img src="../../public/images/caret-right.svg" alt="Seta Para Baixo">
      </a>
      <section class="menu_open absolute max-h-0 overflow-hidden bg-white flex flex-col items-center z-10
        transition-[max-height] duration-300 ease-out
        group-hover:max-h-[1000px] group-hover:transition-[max-height] group-hover:duration-300 group-hover:ease-in drop-shadow-lg
      ">
        <div class="close flex justify-center items-start self-stretch gap-1 p-4 cursor-pointer">
          <a class="self-center text-vermelho font-poppins cursor-pointer" href="cadastrar_admin.php">Novo Cadastro</a>
          <button class="nav-close bg-close w-8 h-8 bg-no-repeat bg-center">
          </button>
        </div>
        <hr class="border-vermelho self-center border-y-1" width="90%">
        <ul class="navlinks flex flex-col justify-center items-start gap-2.5 p-4 self-stretch text-vermelho font-poppins">
          <li>
            <a class="cursor-pointer flex flex-row gap-2.5
                      justify-center items-center"><img src="../../public/images/add-icon.svg" alt="Adicionar">Nova Equipe</a>
          </li>
          <li>
            <a class="cursor-pointer flex flex-row gap-2.5
                      justify-center items-center"><img src="../../public/images/add-icon.svg" alt="Adicionar">Novo Socorrista</a></li>
          <li>
            <a class="cursor-pointer flex flex-row gap-2.5 
                      justify-center items-center"><img src="../../public/images/add-icon.svg" alt="Adicionar">Novo Médico</a>
          </li>
          <li>
            <a class="cursor-pointer flex flex-row gap-2.5
                      justify-center items-center"><img src="../../public/images/add-icon.svg" alt="Adicionar">Nova USB</a>
          </li>
          <li>
            <a class="cursor-pointer flex flex-row gap-2.5
                      justify-center items-center"><img src="../../public/images/add-icon.svg" alt="Adicionar">Novo DESP</a>
          </li>
        </ul>
      </section>
    </li>

    <li class="group flex flex-col items-center">
      <a class="flex flex-row gap-2.5 justify-center items-center cursor-pointer" href="cadastrar_admin.php" onclick="abrirCadastro()">Visualizar<img src="../../public/images/caret-right.svg" alt="Seta Para Baixo"></a>
      <section class="menu_open absolute max-h-0 overflow-hidden bg-white flex flex-col items-center z-10
        transition-[max-height] duration-300 ease-out
        group-hover:max-h-[1000px] group-hover:transition-[max-height] group-hover:duration-300 group-hover:ease-in drop-shadow-lg
      ">
        <div class="close flex justify-center self-stretch p-4 gap-1 cursor-pointer">
          <a class="self-stretch text-vermelho font-poppins cursor-pointer" href="cadastrar_admin.php">Visualizar</a>
          <button class="nav-close bg-close w-8 h-8 bg-no-repeat bg-center">
          </button>
        </div>
        <hr class="border-vermelho self-center border-y-1" width="90%">
        <ul class="navlinks flex flex-col justify-center items-start gap-2.5 p-4 self-stretch text-vermelho font-poppins">
          <li><a class="cursor-pointer flex flex-row gap-2.5 justify-center items-center">Equipes</a></li>
          <li><a class="cursor-pointer flex flex-row gap-2.5 justify-center items-center">Socorristas</a></li>
          <li><a class="cursor-pointer flex flex-row gap-2.5 justify-center items-center">Médicos<img src="../../public/images/caret-right.svg" alt="Seta Para Baixo"></a></li>
          <li><a class="cursor-pointer flex flex-row gap-2.5 justify-center items-center">USBs<img src="../../public/images/caret-right.svg" alt="Seta Para Baixo"></a></li>
          <li><a class="cursor-pointer flex flex-row gap-2.5 justify-center items-center">DESPs</a></li>
        </ul>
      </section>
    </li>
    <li><a class="cursor-pointer hover:text-indigo-300 transition-colors duration-300">Ajuda</a></li>
    <li><img src="../../public/images/pfp.svg" alt="Foto Perfil" aria-hidden="false" class="cursor-pointer"></li>
  </ul>

</nav>