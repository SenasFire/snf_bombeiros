<main class="flex flex-col items-center w-full h-fit p-8 gap-5 font-poppins lg:hidden">
  <!-- Texto placeholder -->
  <div class="placeholder flex flex-row justify-center align-super gap-1.5 self-stretch text-white
    md:justify-start">
    <p class="tablet:text-preto">Release 0.1</p>
  </div>
  <!-- Header -->
  <header class="noar_logo flex flex-col text-center items-center justify-center gap-1 font-poppins
    tablet:flex-row tablet:justify-start tablet:w-full">
    <img src="../public/images/logo-noar-opt.svg" alt="" srcset="" class="w-[192px] h-[192px] tablet:w-[236px] tablet:h-[236px]">
    <div class="tablet:flex tablet:flex-col tablet:items-start tablet:gap-5 tablet:pt-10 tablet:justify-start tablet:text-left">
      <h1 class="hidden tablet:flex font-bold text-3xl text-white tablet:text-preto">Bombeiros Voluntários</h1>
      <h1 class="font-extrabold text-3xl tablet:text-5xl tablet:mt-auto"><span class="text-vermelho font-extrabold">SOS</span> Bombeiros</h1>
    </div>
    </header>
  <!-- Formulário -->
  <section aria-labelledby="title_cadastro" class="flex flex-col gap-2.5 tablet:w-full" title="Form Container">
    <header class="flex flex-col items-center tablet:items-start">
      <h1 id="title_cadastro" class="font-bold text-preto text-xl font-poppins tablet:text-4xl">
        <span class="font-bold text-vermelho">Cadastre-se</span> no app
      </h1>
      <p class="text-sm text-cinza text-center">Insira suas informações para cadastro</p>
    </header>
    
    <form action="../inc/form-handler.inc.php" method="post" class="flex flex-col gap-2.5">
      
      <?php
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        /*echo '
          <div id="error" class="error_message error bg-error_bg border-2 border-border_error hidden flex-row gap-2.5 px-3 p-2.5 rounded-[30px] items-center self-stretch" title="Alerta" aria-label="Alerta">
            <img src="../public/images/alert-icon.svg" alt="Alerta">
            <p class="text-sm text-vermelho font-poppins">Há campos inválidos</p>
          </div>
        ';
        */
      ?>

      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="input_name">Nome:</label>
        <input id="input_name" name="username" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: Henrique Osmar Adelino" required>
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="num_fibra">N° Fibra:</label>
        <input id="num_fibra" name="num_fibra" type="number" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 4200">
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="input_senha">Senha:</label>
        <input id="input_senha" name="pwd" type="password" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="******">
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin">Administrador:</label>
        <div class="container_radio flex flex-row items-center gap-10">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim" name="cmdt_radio" value="Ssim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao" name="cmdt_radio" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>
      <div id="adm_container_mobile" class="input_box hidden flex-col g-2.5" title="Input Box">
        <label for="adm_code_mobile">Registro de Comandante:</label>
        <input id="adm_code_mobile" name="cmdt_code" type="number" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 12665">
      </div>
      <button type="submit" class="button px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
        transition ease-in-out hover:scale-105 tablet:text-3xl disabled:opacity-75 disabled:transition-none">Cadastre-se</button>
      <a href="login.php" class="underline text-sm font-normal text-cinza"><b>Clique aqui</b> caso já tenha cadastro</a>
    </form>
    <div class="content hidden tablet:flex flex-row justify-center items-end self-stretch h-full">
      <p class="text-xs text-cinza"><b>Todos</b> os direitos reservados, SenasTech, 2023</p>
    </div>
  </section>
</main>