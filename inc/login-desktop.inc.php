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
  <section aria-labelledby="title_cadastro" class="flex flex-col gap-2.5 w-1/2" title="Fazer Login">
    <div class="header_form_container flex flex-col justify-center items-center gap-5 w-1/2">
      <header class="flex flex-col items-center w-full">
        <h1 class="font-bold text-preto text-4xl font-poppins text-center"><span class="font-bold text-vermelho">Entrar</span> no app</h1>
        <p class="text-xl lg:text-sm text-cinza font-poppins text-center">Insira suas informações para entrar</p>
      </header>
      <div id="error" class="error_message error bg-error_bg border-2 border-border_error hidden flex-row gap-2.5 px-3 p-2.5 rounded-[30px] items-center self-stretch" title="Alerta" aria-label="Alerta">
        <img src="../public/images/alert-icon.svg" alt="Alerta">
        <p class="text-sm text-vermelho font-poppins">Há campos inválidos</p>
      </div>
      <form class="flex flex-col gap-2.5 w-full font-poppins" action="../inc/login.inc.php" method="POST">
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="nome">N° Fibra:</label>
          <input type="text" name="num_fibra" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 4200" id="n_fibra">
        </div>
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="nome">Senha:</label>
          <input type="password" name="pwd" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="******" id="senha">
        </div>
        <div class="checkbox flex items-center gap-2.5">
          <input type="checkbox" class="input border border-input_placeholder rounded-none appearance-none checked:bg-vermelho w-5 h-5"><p class="text-cinza"><b>Lembrar</b> de mim</p>
        </div>
        <button type="submit" value="login" name="botao_login" class="button px-6 py-4 gap-2.5 lg:text-2xl text-3xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
          transition ease-in-out hover:scale-105 focus:scale-105 disabled:opacity-75 disabled:transition-none">Entrar<img src="../public/images/caret.svg" alt=""></button>
        <a href="cadastro.php" class="underline text-sm font-normal text-cinza focus:outline-vermelho"><b>Clique aqui</b> caso não tenha cadastro</a>
      </form>
    </div>
  </section>
</main>