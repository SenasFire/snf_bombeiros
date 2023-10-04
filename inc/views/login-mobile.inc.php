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
        <span class="font-bold text-vermelho">Entrar</span> no app
      </h1>
      <p class="text-sm text-cinza text-center">Insira suas informações para entrar</p>
    </header>
    
    <form class="flex flex-col gap-2.5" action="../inc/login.inc.php" method="POST" id="form_cadastro">
      <div id="error" class="error_message error bg-error_bg border-2 border-border_error hidden flex-row gap-2.5 px-3 p-2.5 rounded-[30px] items-center self-stretch" title="Alerta" aria-label="Alerta">
        <img src="../public/images/alert-icon.svg" alt="Alerta">
        <p class="text-sm text-vermelho font-poppins">Há campos inválidos</p>
      </div>
      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">N° Fibra:</label>
        <input id="num_fibra" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 4200">
      </div>
      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">Senha:</label>
        <input id="input_senha" type="password" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="******">
      </div>
      <div class="checkbox flex items-center gap-2.5">
        <input type="checkbox" class="w-4 h-4 border border-input_placeholder rounded-none"><p class="text-cinza"><b>Lembrar</b> de mim</p>
      </div>
      <button id="cadastrar" type="submit" name="botao_login" class="button px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
        transition ease-in-out hover:scale-105 tablet:text-3xl">Entrar</button>
      <a href="cadastro.php" class="underline text-sm font-normal text-cinza"><b>Clique aqui</b> caso não tenha cadastro</a>
    </form>
    <div class="content hidden tablet:flex flex-row justify-center items-end self-stretch h-full">
      <p class="text-xs text-cinza"><b>Todos</b> os direitos reservados, SenasTech, 2023</p>
    </div>
  </section>
</main>