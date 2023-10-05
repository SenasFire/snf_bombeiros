<!-- DESKTOP: -->
<main id="main_desktop" class="hidden lg:flex desktop:flex justify-center items-center h-screen bg-none">
  <aside class="flex flex-col justify-center items-center gap-5 p-32 self-stretch w-1/2 lg:w-4/6 h-full bg-ambulance bg-no-repeat bg-center bg-cover">
    <!-- Header -->
    <header class="noar_logo flex flex-col items-center m-auto justify-center gap-5 font-poppins w-1/2 text-center">
      <div class="flex">
        <img src="../public/images/logo-noar-opt.svg" alt="" srcset="" class="w-[176px] h-[176px] lg:w-[132px] lg:h-[132px]">
        <img src="../public/images/ambulancia.png" alt="Logo Ambulância" class="w-[176px] h-[176px] lg:w-[132px] lg:h-[132px]">
      </div>
      <h1 class="font-extrabold text-5xl text-white">SOS Bombeiros</h1>
      <p class="text-center font-poppins text-2xl text-white w-full font-light lg:text-xl"><b class="font-bold">Registro</b> e <b class="font-bold">Acompanhamento</b> de Ocorrências Médicas, Facilitando a <b class="font-bold">Cooperação</b> entre <b class="font-bold">Bombeiros</b> e <b class="font-bold">Médicos</b></p>
    </header>
  </aside>
  <!-- Formulário -->
  <section aria-labelledby="title_cadastro" class="flex flex-col gap-2.5 w-1/2" title="Cadastre-se">
    <div class="header_form_container flex flex-col justify-center items-center gap-5 w-1/2">
      <header class="flex flex-col items-center w-full">
        <h1 class="font-bold text-preto text-4xl font-poppins text-center"><span class="font-bold text-vermelho">Cadastre-se</span> no app</h1>
        <p class="text-xl lg:text-sm text-cinza font-poppins text-center">Insira suas informações para cadastro</p>
      </header>
      <div class="error_message error bg-error_bg border-2 border-border_error hidden flex-row gap-2.5 px-3 p-2.5 rounded-[30px] items-center self-stretch" title="Alerta" aria-label="Alerta">
        <img src="../public/images/alert-icon.svg" alt="Alerta">
        <p class="text-sm text-vermelho font-poppins">Há campos inválidos</p>
      </div>
      <form action="../inc/form-handler.inc.php" method="post" class="flex flex-col gap-2.5 w-full font-poppins">
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="nome_desktop">Nome:</label>
          <input id="nome_desktop" name="username" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: Henrique Osmar Adelino" required>
        </div>
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="num_fibra_desktop">N° Fibra:</label>
          <input id="num_fibra_desktop" name="num_fibra" type="number" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 4200">
        </div>
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="password_desktop">Senha:</label>
          <input id="password_desktop" name="pwd" type="password" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="******">
        </div>
        <div class="input_box flex flex-col gap-2.5" title="Input Box">
          <label for="admin">Administrador:</label>
          <div id="admin" class="container_radio flex flex-row items-center gap-10">
            <div class="flex items-center gap-2.5">
              <input type="radio" id="adm_sim_desktop" name="cmdt_radio" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full">
              <label for="adm_sim_desktop">Sim</label>
            </div>
            <div class="flex items-center gap-2.5">
              <input type="radio" id="adm_nao_desktop" name="cmdt_radio" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full">
              <label for="adm_nao_desktop">Não</label>
            </div>
          </div>
        </div>
        <div id="adm_code_container" class="input_box hidden flex-col g-2.5" title="Input Box">
          <label for="adm_code_desktop">Registro de Comandante:</label>
          <input id="adm_code_desktop" name="cmdt_code" type="number" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 12665">
        </div>
        <button type="submit" class="button px-6 py-4 gap-2.5 lg:text-2xl text-3xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
          transition ease-in-out hover:scale-105 focus:scale-105 disabled:opacity-75 disabled:transition-none">Cadastre-se<img src="../public/images/caret.svg" alt=""></button>
        <a href="login.php" class="underline text-sm font-normal text-cinza focus:outline-vermelho"><b>Clique aqui</b> caso já tenha cadastro</a>
      </form>
    </div>
  </section>
</main>