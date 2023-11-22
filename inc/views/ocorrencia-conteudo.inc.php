<section class="form-container flex flex-col items-center justify-center md:w-full tablet:w-full">  
  <form action="">
    <!-- CABEÇALHO DA OCORRÊNCIA -->
    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">Nome do Paciente:</label>
      <input  id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: Henrique Osmar Adelino" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="data">Data</label>
      <input id="data" type="date" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: 4200" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">Sexo:</label>
      <select name="" id="">
        <option value="" disabled selected>Selecione: Masculino / Feminino</option>
        <option value="">Masculino</option>
        <option value="">Feminino</option>
      </select>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">Nome do Hospital:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: Hospital Dona Helena" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">RG/CPF do Paciente:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho"placeholder="Ex: 123.456.789-01" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">Idade do Paciente:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: 56 anos" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">Acompanhante:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho"placeholder="Ex: (47) 9002-8922" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">Idade do Acompanhante:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: Paulo César" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">Local da Ocorrência:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: Rua Petrópolis 1940" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">N° USB:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: 123" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">N° da Ocorrência:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: 456789" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">DESP:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: 190" required>
    </div>

    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">H.CH:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: xxx" required>
    </div>

    <!-- TIPO DE OCORRÊNCIA: -->
    <section>
      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Causado por animais </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Com meio de transporte </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Desmoronamento/Deslizamento </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Emergência Médica </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Queda de altura 2M </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Tentativa de Suicídio </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Queda própria altura </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Afogamento</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Agressão</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Atropelamento</span>
        </div>
      </div>
    </section>

    <section>
      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Choque Elétrico </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Desabamento</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Doméstico</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Esportivo</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Intoxicação</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Queda de bicicleta</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Queda de moto</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Queda de nível menor que 2M </span>
        </div>
      </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Trabalho </span>
          </div>
      </div> 

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Tranferência </span>
        </div>
      </div>
    </section>

    <!-- PROBLEMAS SUSPEITOS: -->
    <div class="p-4">
      <div class="flex items-center gap-2 space-x-2">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Psiquiátrico </span>
      </div>
    </div>
    <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
      <label for="id1">Respiratório</label>
      <select name="" id="">
        <option value="None" disabled="" selected="">Selecione:</option>
        <option value="Nenhum">Nenhum</option>
        <option value="DPOC">DPOC</option>
        <option value="Inalação">Inalação Fumaça</option>
      </select>
    </div>
    <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
      <label for="id1">Diabetes</label>
      <select name="" id="">
        <option value="None" disabled="" selected="">Selecione:</option>
        <option value="Nenhum">Nenhum</option>
        <option value="Hiperglicemia">Hiperglicemia</option>
        <option value="Hipoglecima">Hipoglecima</option>
      </select>
    </div>
    <div class="p-4">
      <div class="flex items-center gap-2 space-x-2">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Outros problemas: </span>
      </div>
    </div>
    <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
      <label for="id1">Obstérico</label>
      <select name="" id="">
        <option value="None" disabled="" selected="">Selecione:</option>
        <option value="Nenhum">Nenhum</option>
        <option value="Parto Emergencial">Parto Emergencial</option>
        <option value="Gestante">Gestante</option>
        <option value="Hemor.Excessiva">Hemor.Excessiva</option>
      </select>
    </div>
    <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
      <label for="id1">Transporte</label>
      <select name="" id="">
        <option value="None" disabled="" selected="">Selecione:</option>
        <option value="Nenhum">Nenhum</option>
        <option value="Aéreo">Aéreo</option>
        <option value="Clínico">Clínico</option>
        <option value="Emergencial">Emergencial</option>
        <option value="Pós-Trauma">Pós-Trauma</option>
        <option value="Samu">Samu</option>
        <option value="Sem Remoção">Sem Remoção</option>
      </select>
    </div>
    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">Outros:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite aqui..." required>
    </div>

    <!-- SINAIS E SINTOMAS: -->    
    <section class="flex flex-col laptop:flex-row gap-4 laptop:gap-10 desktop:gap-20">
      <section class="flex flex-col gap-4">
        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Abdomen sensivel ou rígido </span>
          </div>
        </div>
    
        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Afundamento de crânio </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Agitação </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Amnésia </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Angina de peito </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Apinéia </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Bradicardia </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Bradipnéia </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Bronco - Aspirando </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Cefaléia </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Cianose </span>
          </div>
        </div>
      </section>
      <section class="flex flex-col gap-4 desktop:border-l-2 border-[#595959] desktop:px-10">
        <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
          <select name="" id="">
              <option value="" disabled selected>Selecione:</option>
              <option value="">Lábios</option>
              <option value="">Extremidade</option>
            </select>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Convulção </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Decorticação </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Deformidade </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Descerebração </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Desmaio </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Desvio de traquéia </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Dispenéia </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Dor local </span>
          </div>
        </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <span class="text-gray-700">Outro</span>
            <input id="input_other" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:scale-105 focus:text-black focus:bg-white focus:outline-vermelho" placeholder="Digite aqui..." required>
          </div>
        </div>
      </section>
    </section>


    <!-- FORMA DE CONDUÇÃO: -->
    <div class="input_box flex flex-col gap-2.5" title="Input Box">
      <div id="admin" class="container_radio flex flex-col gap-5">
        <div class="flex items-center gap-2.5">
          <input type="radio" id="adm_sim_desktop" name="escolha" value="sim" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
          <label for="adm_sim_desktop">Deitada</label>
        </div>
        <div class="flex items-center gap-2.5">
          <input type="radio" id="adm_nao_desktop" name="escolha" value="nao" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
          <label for="adm_nao_desktop">Sentada</label>
        </div>
        <div class="flex items-center gap-2.5">
          <input type="radio" id="adm_nao_desktop" name="escolha" value="nao" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
          <label for="adm_nao_desktop">Semi-deitada</label>
        </div>
      </div>
    </div>


    <!-- O QUE A VÍTIMA ERA: -->
    <section class="flex flex-col gap-2.5">
      <div class="flex items-center gap-2 ">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Ciclista </span>
      </div>
    
      <div class="flex items-center gap-2 ">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Condutor moto </span>
      </div>
    
      <div class="flex items-center gap-2 ">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Gestante </span>
      </div>
    
      <div class="flex items-center gap-2 ">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Passageiro do banco da frente </span>
      </div>
    
      <div class="flex items-center gap-2 ">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Passageiro moto </span>
      </div>

      <div class="flex items-center gap-2 ">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Condutor carro </span>
      </div>

      <div class="flex items-center gap-2 ">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Clínico </span>
      </div>

      <div class="flex items-center gap-2 ">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Trauma </span>
      </div>

      <div class="flex items-center gap-2 ">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Passageiro do banco de trás </span>
      </div>

      <div class="flex items-center gap-2 ">
        <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <span class="text-gray-700"> Pedestre </span>
      </div>
    </section>

    <!-- DECISÃO DE TRANSPORTE: -->

    <div class="input_box flex flex-col gap-2.5" title="Input Box">
      <div id="admin" class="container_radio flex flex-col gap-5">
        <div class="flex items-center gap-2.5">
          <input type="radio" id="adm_sim_desktop" name="escolha" value="sim" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
          <label for="adm_sim_desktop">Crítico</label>
        </div>
        <div class="flex items-center gap-2.5">
          <input type="radio" id="adm_nao_desktop" name="escolha" value="nao" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
          <label for="adm_nao_desktop">Instável</label>
        </div>
        <div class="flex items-center gap-2.5">
          <input type="radio" id="adm_nao_desktop" name="escolha" value="nao" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
          <label for="adm_nao_desktop">Potencialmente instável</label>
        </div>
        <div class="flex items-center gap-2.5">
          <input type="radio" id="adm_nao_desktop" name="escolha" value="nao" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
          <label for="adm_nao_desktop">Estável</label>
        </div>
    </div>

  

    <!-- FIM CABEÇALHO OCORRÊNCIA -->
    <div class="input_box flex flex-col g-2.5" title="Input Box">
      <label for="nome">KM Final:</label>
      <input id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
      transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: xxx" required>
    </div>

  </form>
</section>