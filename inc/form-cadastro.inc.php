<!-- Formulário -->
<section aria-labelledby="title_cadastro" class="flex flex-col gap-2.5" title="Form Container">
  <header class="flex flex-col items-center">
    <h1 id="title_cadastro" class="font-bold text-preto text-xl font-poppins"><span class="font-bold text-vermelho">Cadastre-se</span> no app</h1>
    <p class="text-sm text-cinza">Insira suas informações para cadastro</p>
  </header>

  <form class="flex flex-col gap-2.5" action="" method="" id="form_cadastro">
    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">Nome:</label>
      <input type="text" class="border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: Henrique Osmar Adelino" id="nome">
    </div>
    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">N° Fibra:</label>
      <input type="text" class="border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: 4200" id="n_fibra">
    </div>
    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">Senha:</label>
      <input type="password" class="border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="***" id="senha">
    </div>
    <a href="#" onclick="event.preventDefault()" class="underline font-normal text-cinza">Ao se cadastrar você concorda com os <b>termos de uso</b></a>
    <button type="submit" onclick="event.preventDefault()" class="px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
      transition ease-in-out hover:scale-105">Cadastrar</button>
    <a href="#" onclick="event.preventDefault()" class="underline text-sm font-normal text-cinza"><b>Clique aqui</b> caso já tenha cadastro</a>
  </form>
</section>