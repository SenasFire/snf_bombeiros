<!-- Formulário -->
<section aria-labelledby="title_cadastro" class="flex flex-col gap-2.5 tablet:w-full" title="Form Container">
  <header class="flex flex-col items-center tablet:items-start">
    <h1 id="title_cadastro" class="font-bold text-preto text-xl font-poppins tablet:text-4xl">
      <span class="font-bold text-vermelho">Cadastre-se</span> no app
    </h1>
    <p class="text-sm text-cinza text-center">Insira suas informações para cadastro</p>
  </header>
  
  <form class="flex flex-col gap-2.5" action="" method="" id="form_cadastro">
    <div id="error" class="error_message error bg-error_bg border-2 border-border_error hidden flex-row gap-2.5 px-3 p-2.5 rounded-[30px] items-center self-stretch" title="Alerta" aria-label="Alerta">
      <img src="../public/images/alert-icon.svg" alt="Alerta">
      <p class="text-sm text-vermelho font-poppins">Há campos inválidos</p>
    </div>
    
    <div class="input_box flex flex-col gap-2.5" title="Input Box">
      <label for="input_name">Nome:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: Henrique Osmar Adelino" required>
    </div>
    <div class="input_box flex flex-col gap-2.5" title="Input Box">
      <label for="num_fibra">N° Fibra:</label>
      <input id="num_fibra" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 4200">
    </div>
    <div class="input_box flex flex-col gap-2.5" title="Input Box">
      <label for="input_senha">Senha:</label>
      <input id="input_senha" type="password" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="******">
    </div>
    <div class="input_box flex flex-col gap-2.5" title="Input Box">
      <label for="admin">Administrador:</label>
      <div class="container_radio flex flex-row items-center gap-10">
        <div class="flex items-center gap-2.5">
          <input type="radio" id="adm_sim" name="escolha" value="sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_sim">Sim</label>
        </div>
        <div class="flex items-center gap-2.5">
          <input type="radio" id="adm_nao" name="escolha" value="nao" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_nao">Não</label>
        </div>
      </div>
    </div>
    <div id="adm_container_mobile" class="input_box hidden flex-col g-2.5" title="Input Box">
      <label for="adm_code_mobile">Registro de Comandante:</label>
      <input id="adm_code_mobile" type="password" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 12665">
    </div>
    <button id="cadastrar" type="submit" onclick="event.preventDefault()" class="button px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
      transition ease-in-out hover:scale-105 tablet:text-3xl">Cadastre-se</button>
    <a href="#" onclick="event.preventDefault()" class="underline text-sm font-normal text-cinza"><b>Clique aqui</b> caso já tenha cadastro</a>
  </form>
  <div class="content hidden tablet:flex flex-row justify-center items-end self-stretch h-full">
    <p class="text-xs text-cinza"><b>Todos</b> os direitos reservados, SenasTech, 2023</p>
  </div>
</section>