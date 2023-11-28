<header class="noar_logo flex flex-col text-center items-center justify-center gap-1 font-poppins md:hidden">
    <img src="../public/images/logo-noar-opt.svg" alt="" srcset="" class="w-[192px] h-[192px] tablet:w-[236px] tablet:h-[236px]">
    <div class="tablet:flex tablet:flex-col tablet:items-start tablet:gap-5 tablet:pt-10 tablet:justify-start tablet:text-left">
      <legend class="hidden font-bold text-3xl text-white tablet:text-preto">Bombeiros Voluntários</legend>
    </div>
</header>
<section aria-labelledby="title_main" class="flex flex-col px-8 justify-center items-center gap-10 self-stretch">
  <header class="flex flex-col justify-center items-center gap-3 self-stretch text-center last:pb-2 last:border-b-2 laptop:last:p-6 last:border-[#595959]">
    <h1 id="title_main"  class="font-bold text-3xl"><span class="text-vermelho">Histórico</span> da ocorrência</h1>
    <p id="subtitle"     class="text-cinza text-sm text-center">Selecione as opções abaixo de acordo com a sua <b>necessidade.</b></p>
  </header>
</section>
<section class="form-container flex flex-col items-center justify-center md:w-full tablet:w-full">
    <form class="flex flex-col gap-8 md:gap-12 font-poppins" action="../inc/class/cadastrar-historico.class.php" method="POST">
      <section>
        <legend class="font-bold text-xl text-center tablet:text-2xl ">Este histórico é relativo à qual ocorrência?</legend>
        <div class="input-box flex flex-row justify-center items-center px-8 py-4 w-full bg-[#F2F2F2]">
          <select class="text-xl text-center" name="ocorrencia" id="ocorrencia_relativo">
            <option value="None" disabled selected>Selecione:</option>
            <?php
              $dbh = new Dbh();
              $sql = "SELECT ocorrencia_id, ocorrencia.nome_paciente, ocorrencia.cpf, ocorrencia.local_ocorrencia FROM ocorrencia";
            
              $stmt = $dbh->connect()->prepare($sql);
              $stmt->execute();
              $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

              //  - Cada select é preenchido com options
              //  - Options são echos de resultados de uma consulta SQL
              //  - Só podem ser criadas equipes com usuários que existam
              foreach ($resultados as $resultado) {
                $id_ocorrencia = $resultado["ocorrencia_id"];
                $paciente = $resultado["nome_paciente"];
                $cpf = $resultado["cpf"];
                $local = $resultado["local_ocorrencia"];

                echo("<option class='text-xl' value=$id_ocorrencia>");
                  echo("ID: " . $id_ocorrencia . " - Paciente: " . $paciente . " - CPF: ". $cpf . " - Local: " . $local);
                echo("</option>");
              }
            ?>
          </select>
        </div>
      </section>
<!--

  Seção procedimentos / imobilizações / meios auxiliares responsividade:

-->
      <section class="flex flex-col gap-4">
        <legend class="font-bold text-xl text-center tablet:text-2xl ">Procedimentos Efetuados</legend>
        <section class="flex flex-col laptop:flex-row gap-4 laptop:gap-10 desktop:gap-20">
          <section class="flex flex-col gap-4">
            <div class="flex items-center gap-2">
              <input name="procedimento_efetuado_checkbox[]" value="Avaliação Inicial" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Avaliação Inicial</span>
            </div>
            <div class="flex items-center gap-2">
              <input name="procedimento_efetuado_checkbox[]" value="Avaliação Dirigida" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Avaliação Dirigida </span>
            </div>
            <div class="flex items-center gap-2">
              <input name="procedimento_efetuado_checkbox[]" value="Avaliação Continuada" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Avaliação Continuada </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Aspiração" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Aspiração </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Chave Rautek" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Chave de Rautek </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Cânula de Guedel" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Cânula de Guedel </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Desobstrução de V.A" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Desobstrução de V.A </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Emprego de D.E.A" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Emprego de D.E.A </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Gerenciamento de riscos" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Gerenciamento de riscos </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Limpeza de ferimento" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Limpeza de ferimento </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Curativos" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Curativos </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Compressivo" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Compressivo </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Encravamento" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Encravamento </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Ocular" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Ocular </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Queimadura" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Queimadura </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="Simples" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Simples </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="procedimento_efetuado_checkbox[]" value="3 Pontas" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> 3 Pontas </span>
            </div>
            <!-- Seleção de Imobilização -->
            <legend class="font-bold text-xl text-row tablet:text-2xl">Selecione se alguma imobilização foi realizada</legend>
            <section class="flex flex-col gap-4 tablet:flex-row md:gap-10">
              <section class="flex flex-col gap-4">
                <div class="flex items-center gap-2 ">
                    <input name="selecao_de_imobilizacao_checkbox[]" value="Membro Inferior Direito." type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Membro Inf. Dir. </span>
                </div>
                <div class="flex items-center gap-2 ">
                    <input name="selecao_de_imobilizacao_checkbox[]" value="Membro Inferior Esquerdo." type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Membro Inf. Esq. </span>
                </div>
                  <div class="flex items-center gap-2 ">
                    <input name="selecao_de_imobilizacao_checkbox[]" value="Membro Superior Direito" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Membro Sup. Dir. </span>
                </div>
                <div class="flex items-center gap-2 ">
                    <input name="selecao_de_imobilizacao_checkbox[]" value="Membro Superior Esquerdo" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Membro Sup. Esq. </span>
                </div>
                <div class="flex items-center gap-2 ">
                    <input name="selecao_de_imobilizacao_checkbox[] value="Quadril" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Quadril </span>
                </div>
                <div class="flex items-center gap-2 ">
                    <input name="selecao_de_imobilizacao_checkbox[]" value="Cervical" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Cervical </span>
                </div>
                <div class="flex items-center gap-2 ">
                    <input name="selecao_de_imobilizacao_checkbox[]" value="Maca sobre rodas" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Maca sobre rodas </span>
                </div>
                <div class="flex items-center gap-2 ">
                    <input name="selecao_de_imobilizacao_checkbox[]" value="Maca Rígida" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Maca rígida </span>
                </div>
                <div class="flex items-center gap-2 ">
                    <input name="selecao_de_imobilizacao_checkbox[]" value="Ponte" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Ponte </span>
                </div>
                <div class="flex items-center gap-2 ">
                    <input name="selecao_de_imobilizacao_checkbox[]" value="Retirado Capacete" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Retirado Capacete </span>
                </div>
              </section>
            </section>
          </section>
          <!-- Flex row coluna 2: -->
          <section class="flex flex-col gap-4 desktop:border-l-2 border-[#595959] desktop:px-10">
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="R.C.P" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> R.C.P </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Rolamento 90°C" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Rolamento 90°C </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Rolamento 180°C" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Rolamento 180°C </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Tomada decisão" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Tomada decisão </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Tratado Choque" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Tratado choque </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Uso de Cânula" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Uso de cânula </span>
            </div>
            <div class="flex items-center gap-2">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Uso Colar" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Uso colar </span>
            </div>
            <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
              <label for="nome">Tamanho colar</label>
              <select name="tamanho_colar" id="nome">
                  <option value="None" disabled selected>Selecione:</option>
                  <option value="Nenhum">Nenhum</option>
                  <option value="GG">GG</option>
                  <option value="G">G</option>
                  <option value="PP">PP</option>
                  <option value="P">P</option>
              </select>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Uso KED" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Uso KED </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Uso TIF" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Uso TIF </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Ventilação Suporte" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Ventilação Suporte </span>
            </div>
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Oxigênioterapia" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Oxigênioterapia </span>
            </div>
            <div class="input_box flex flex-col g-2.5" title="Input Box">
              <label for="nome">LPM</label>
              <input name="selecao_de_imobilizacao" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
                transition ease-in-out focus:scale-105 focus:text-black focus:bg-white focus:outline-vermelho" placeholder="Ex: 3 lpm">
            </div>
            <div class="flex items-center gap-2 ">
              <input name="selecao_de_imobilizacao_checkbox[]" value="Reanimador" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Reanimador </span>
            </div>
            <!-- Meios Auxiliares da Ocorrência  -->
            <legend class="font-bold text-xl text-row tablet:text-2xl ">Selecione os meios auxiliares da ocorrência (Polícia, Defesa Civil, ...)</legend>
            <section class="flex flex-col gap-2 p-5 tablet:flex-row md:p-10 md:gap-10 bg-[#F2F2F2]">
              <div class="flex items-center gap-2 ">
                <input name="Meios_Auxiliares_Ocorrencia[]" value="Meios Auxiliares" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                <span class="text-gray-700"> Meios auxiliares </span>
              </div>
              <section class="flex flex-col gap-2.5">
                <div class="flex items-center gap-2 ">
                  <input name="Meios_Auxiliares_Ocorrencia[]" value="CELESC" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                  <span class="text-gray-700"> CELESC </span>
                </div>
                <div class="flex items-center gap-2 ">
                  <input name="Meios_Auxiliares_Ocorrencia[]" value="Defesa Civil" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                  <span class="text-gray-700"> DEF. CIVIL </span>
                </div>
                <div class="flex items-center gap-2 ">
                  <input name="Meios_Auxiliares_Ocorrencia[]" value="IGP/PC" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                  <span class="text-gray-700"> IGP/PC </span>
                </div>
                <div class="flex items-center gap-2 ">
                  <input name="Meios_Auxiliares_Ocorrencia[]" value="SAMU" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                  <span class="text-gray-700"> SAMU </span>
                </div>
                <div class="flex items-center gap-2 ">
                  <input name="Meios_Auxiliares_Ocorrencia[]" value="CIT" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                  <span class="text-gray-700"> CIT </span>
                </div>
                <div class="flex items-center gap-2 ">
                  <input name="Meios_Auxiliares_Ocorrencia[]" value="USA" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                  <span class="text-gray-700"> USA </span>
                </div>
                <div class="flex items-center gap-2 ">
                  <input name="Meios_Auxiliares_Ocorrencia[]" value="USB" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                  <span class="text-gray-700"> USB </span>
                </div>
              </section>
              <section class="policia flex flex-row gap-10">
                <div class="flex items-center gap-2 ">
                  <input name="Meios_Auxiliares_Ocorrencia[]" value="Polícia" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                  <span class="text-gray-700"> Polícia </span>
                </div>
                <div class="flex flex-col gap-2.5">
                  <div class="flex items-center gap-2 ">
                    <input name="Meios_Auxiliares_Ocorrencia[]" value="Civil" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Civil </span>
                  </div>
                  <div class="flex items-center gap-2 ">
                    <input name="Meios_Auxiliares_Ocorrencia[]" value="Militar" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> Militar </span>
                  </div>
                  <div class="flex items-center gap-2 ">
                    <input name="Meios_Auxiliares_Ocorrencia[]" value="PRE" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> PRE </span>
                  </div>
                  <div class="flex items-center gap-2 ">
                    <input name="Meios_Auxiliares_Ocorrencia[]" value="PRF" type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
                    <span class="text-gray-700"> PRF </span>
                  </div>
                </div>
              </section>
            </section>
          </section>
        </section>
      </section>


<!--

  MATERIAIS DESCARTÁVEIS MAIN CONTAINER:

-->

      <section class="container-materiais flex flex-col items-center justify-center md:gap-12 md:w-full tablet:w-full">
        <!-- Área de seleção par a Materiais Utilizados Descartáveis -->
        <section class="container-descartaveis flex flex-col items-center justify-center gap-4 odd:bg-white even:bg-[#F2F2F2] w-full">
          <legend class="font-bold text-xl text-row tablet:text-2xl ">Materiais Utilizados Descartáveis</legend>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <p class="w-full text-center">Material</p>
            <p class="w-full text-center">Quantidade</p>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full">
            <label for="id1">Ataduras</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="ataduras" id="num_fibra" type="number" class="text-center bg-input_color py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <label for="id1">Cateter TP.Óculos</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="cateter_tp_oculos" id="num_fibra" type="number" class="text-center bg-white py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full">
            <label for="id1">Compressa Comum</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="compressa_comum" id="num_fibra" type="number" class="text-center bg-input_color py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <label for="id1">KITS</label>
            <select name="kit_tipo" id="">
              <option value="None" disabled selected>Selecione...</option>
              <option value="X">X</option>
              <option value="P">P</option>
              <option value="Q">Q</option>
            </select>
            <div class="flex flex-row justify-end w-1/2">
              <input name="kit_qtd" id="num_fibra" type="number" class="text-center bg-white py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full">
            <label for="id1">Luvas Desc (Pares)</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="luvas" id="num_fibra" type="number" class="text-center bg-input_color py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <label for="id1">Máscara Desc</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="mascaras" id="num_fibra" type="number" class="text-center bg-white py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full">
            <label for="id1">Manta aluminizada</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="manta_aluminizada" id="num_fibra" type="number" class="text-center bg-input_color py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <label for="id1">Pás do DEA</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="pas_dea" id="num_fibra" type="number" class="text-center bg-white py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full">
            <label for="id1">Sonda de Aspiração</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="sonda_asp" id="num_fibra" type="number" class="text-center bg-input_color py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <label for="id1">Soro Fisiólogico</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="soro_fisiologico" id="num_fibra" type="number" class="text-center bg-white py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <label for="id1">Talas</label>
            <select name="talas_tipo" id="">
              <option value="None" disabled selected>Selecione...</option>
              <option value="P">P</option>
              <option value="G">G</option>
            </select>
            <div class="flex flex-row justify-end w-1/2">
              <input name="talas_qtd" id="num_fibra" type="number" class="text-center bg-white py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
              transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
        </section>
        <!-- Lista de Materias Utilizados na Ocorrência -->
        <section class="container-utilizados flex flex-col items-center justify-center gap-4 md:w-full tablet:w-full">
          <legend class="font-bold text-xl text-row tablet:text-2xl ">Materias Utilizados na Ocorrência</legend>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <p class="w-full text-center">Material</p>
            <p class="w-full text-center">Quantidade</p>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full">
            <label for="id1">Base do Estabilizador</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="base_establizador" id="num_fibra1" type="number" class="text-center bg-input_color py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
                transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <label for="id1">Colar</label>
            <select name="colar_tipo" id="">
              <option value="None" disabled selected>Selecione:</option>
              <option value="Nenhum">Nenhum</option>
              <option value="GG">GG</option>
              <option value="G">G</option>
              <option value="PP">PP</option>
              <option value="P">P</option>
            </select>
            <div class="flex flex-row justify-end w-1/2">
              <input name="colar_qtd" id="num_fibra2" type="number" class="text-center bg-white py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
                transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full">
            <label for="id1">Coxins</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="coxins" id="num_fibra3" type="number" class="text-center bg-input_color py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
                transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <label for="id1">KED</label>
            <select name="ked_tipo" id="">
              <option value="None" disabled selected>Selecione...</option>
              <option value="Nenhum">Nenhum</option>
              <option value="Adulto">Adulto</option>
              <option value="Infantil">Infantil</option>
            </select>
            <div class="flex flex-row justify-end w-1/2">
              <input name="ket_qtd" id="num_fibra4" type="number" class="text-center bg-white py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
                transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full">
            <label for="id1">Maca Rígida</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="maca_rigida" id="num_fibra5" type="number" class="text-center bg-input_color py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
                transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <label for="id1">T.T.F</label>
            <select name="ttf_tipo" id="">
              <option value="None" disabled selected>Selecione...</option>
              <option value="Nenhum">Nenhum</option>
              <option value="Adulto">Adulto</option>
              <option value="Infantil">Infantil</option>
            </select>
            <div class="flex flex-row justify-end w-1/2">
              <input name="qtd_ttf" id="num_fibra6" type="number" class="text-center py-2 input border-b-2 border-[#595959] w-1/2 bg-white text-input_placeholder text-sm
                transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full">
            <label for="id1">Tirante Aranha</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="tirante_aranha" id="num_fibra7" type="number" class="text-center bg-input_color py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
                transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <label for="id1">Tirante de Cabeça</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="tirante_cabeca" id="num_fibra8" type="number" class="text-center py-2 input border-b-2 border-[#595959] w-1/2 bg-white text-input_placeholder text-sm
                transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full">
            <label for="id1">Cânula</label>
            <div class="flex flex-row justify-end w-1/2">
              <input name="canula" id="num_fibra9" type="number" class="text-center bg-input_color py-2 input border-b-2 border-[#595959] w-1/2 text-input_placeholder text-sm
                transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="0">
            </div>
          </div>
          <!-- Observações Importantes -->
          <div class="outro flex flex-row justify-between gap-5 w-full">
            <legend class="font-bold text-xl self-center text-center text-row tablet:text-2xl ">Observações Importantes</legend>
            <textarea name="observacoes" id="" cols="30" rows="10" class="text-center input border-b-2 border-[#595959] w-full bg-input_color text-input_placeholder text-sm
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite aqui..."></textarea>
          </div>
        </section>

        <button type="submit" class="text-[16px] px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
        transition ease-in-out hover:scale-105">Salvar Dados</button>
        <p class="text-cinza text-sm text-center">Os dados serão salvos na sua <b>ocorrência.</b></p>
      </section>
    </form>
    </section>
        </section>  
    </form>
</section>