<?php
require_once "../class/dbh.class.php";
$id = $_GET["id"];
$dbh = new Dbh();

if(!isset($_GET['action'])) {
    $nomePaciente = $_POST["Nome_do_paciente"];
    $cpf = $_POST["CPF"];
    $genero = $_POST["Gênero"];
    $idade = $_POST["Idade"];
    $acompanhante = $_POST["Acompanhante"];
    $idadeAcompanhante = $_POST["Idade_do_acompanhante"];
    $numOcorrencia = $_POST["Número_da_ocorrência"];
    $localOcorrencia = $_POST["Local_da_ocorrência"];
    $dataOcorrencia = $_POST["Data_da_ocorrência"];
    $equipeAtendimento = $_POST["Equipe_de_atendimento"];
    $numDesp = $_POST["Despachante"];
    $ocorrenciaOutrasVezes = $_POST["Ocorrência_já_aconteceu_outras_vezes"];
    $qtTempoAconteceu = $_POST["A_quanto_tempo_aconteceu?"];
    $problemaSaude = $_POST["Possuí_problema_de_saúde?"];
    $tipoProblemaSaude = $_POST["Problema_de_saúde"];
    $fazUsoMedicacao = $_POST["Faz_uso_de_medicação"];
    $horarioMedicacao = $_POST["Horário_da_medicação"];
    $medicamentoUtilizado = $_POST["Medicamento_utilizado"];
    $possuiAlergias = $_POST["Possuí_alergias"];
    $tipoAlergia = $_POST["Tipo_da_alergia"];
    $ingeriuAlimento = $_POST["Ingeriu_algo"];
    $horarioIngestao = $_POST["Horário_da_ingestão"];
    $bracoEsquerdo = $_POST["Tipo_de_lesão_-_Braço_Esquerdo"];
    $bracoDireito = $_POST["Tipo_de_lesão_-_Braço_Direito"];
    $cabeca = $_POST["Tipo_de_lesão_-_Cabeça"];
    $peito = $_POST["Tipo_de_lesão_-_Peito"];
    $estomago = $_POST["Tipo_de_lesão_-_Estômago"];
    $virilha = $_POST["Tipo_de_lesão_-_Virilha"];
    $peEsquerdo = $_POST["Tipo_de_lesão_-_Pé_Esquerdo"];
    $peDireito = $_POST["Tipo_de_lesão_-_Pé_Direito"];
    $maoEsquerda = $_POST["Tipo_de_lesão_-_Mão_Esquerda"];
    $maoDireita = $_POST["Tipo_de_lesão_-_Mão_Direita"];
    $outroLocal = $_POST["Outros"];
    $observacoes = $_POST["Observações"];
    $respostaOcular = $_POST["Resposta_ocular"];
    $respostaVerbal = $_POST["Resposta_verbal"];
    $respostaMotora = $_POST["Resposta_motora"];
    $avaliacaoGCSTotal = $_POST["Avaliação_GCS_total"];
    $tipoOcorrencia = $_POST["Tipo_da_ocorrência"];
    $disturbioComportamento = $_POST["Distúrbio_de_comportamento"];
    $vitimaUsavaCapacete = $_POST["Vítima_usava_capacete"];
    $vitimaUsavaCinto = $_POST["Vítima_usava_cinto"];
    $paraBrisasAvariado = $_POST["Para-brisas_avariado"];
    $vitimaCaminhando = $_POST["Vítima_caminhando_no_local"];
    $painelAvariado = $_POST["Painel_avariado"];
    $volanteTorcido = $_POST["Volante_torcido"];
    $problemasSuspeitos = $_POST["Problemas_suspeitos"];
    $problemaRespiratorio = $_POST["Problema_respiratório"];
    $diabetes = $_POST["Diabetes"];
    $problemaObstetrico = $_POST["Problema_obstérico"];
    $formaTransporte = $_POST["Forma_de_transporte"];
    $sinaisSintomas = $_POST["Sinais_e_sintomas"];
    $localCianose = $_POST["Local_cianose"];
    $formaConducao = $_POST["Forma_de_condução"];
    $vitimaEra = $_POST["Vítima_era"];
    $decisaoTransporte = $_POST["Decisão_de_transporte"];
    $pressaoArterial = $_POST["Pressão_arterial"];
    $pulso = $_POST["Pulso_cardíaco_BCPM"];
    $respiracao = $_POST["Respiração_M_R_M"];
    $saturacao = $_POST["Saturação_(%)"];
    $temperatura = $_POST["Temperatura_(°C)"];
    $perfusao = $_POST["Perfusão"];
    $quilometragemFinal = $_POST["Quilometragem_final"];
    $hospital = $_POST["Hospital"];
    $hch = $_POST["HCH"];
    $numUSB = $_POST["Número_USB"];

    $sql = "UPDATE ocorrencia SET 
            nome_paciente = '$nomePaciente',
            cpf = '$cpf',
            genero = '$genero',
            idade = $idade,
            acompanhante = '$acompanhante',
            idade_acompanhante = $idadeAcompanhante,
            num_ocorrencia = $numOcorrencia,
            local_ocorrencia = '$localOcorrencia',
            data = '$dataOcorrencia',
            equipe_atendimento = $equipeAtendimento,
            num_desp = $numDesp,
            aconteceu_outras_vezes = '$ocorrenciaOutrasVezes',
            qt_tempo_aconteceu = '$qtTempoAconteceu',
            problema_saude = '$problemaSaude',
            tipo_problema_saude = '$tipoProblemaSaude',
            medicacao = '$fazUsoMedicacao',
            medicacao_horario = '$horarioMedicacao',
            medicamento_usado = '$medicamentoUtilizado',
            alergia = '$possuiAlergias',
            alergia_tipo = '$tipoAlergia',
            ingeriu_alimento = '$ingeriuAlimento',
            horario_ingestao = '$horarioIngestao',
            braco_esquerdo_tipo = '$bracoEsquerdo',
            braco_direito_tipo = '$bracoDireito',
            cabeca_tipo = '$cabeca',
            peito_tipo = '$peito',
            estomago_tipo = '$estomago',
            virilha_tipo = '$virilha',
            pe_esquerdo_tipo = '$peEsquerdo',
            pe_direito_tipo = '$peDireito',
            mao_esquerda_tipo = '$maoEsquerda',
            mao_direita_tipo = '$maoDireita',
            outros = '$outroLocal',
            observacoes = '$observacoes',
            abertura_ocular = '$respostaOcular',
            resposta_verbal = '$respostaVerbal',
            resposta_motora = '$respostaMotora',
            total_gcs = $avaliacaoGCSTotal,
            tipo_ocorrencia = '$tipoOcorrencia',
            disturbio_comportamento = '$disturbioComportamento',
            capacete = '$vitimaUsavaCapacete',
            cinto = '$vitimaUsavaCinto',
            avariado_parabrisa = '$paraBrisasAvariado',
            caminhando = '$vitimaCaminhando',
            avariado_painel = '$painelAvariado',
            torcido_vol = '$volanteTorcido',
            problemas_suspeitos = '$problemasSuspeitos',
            problema_resp = '$problemaRespiratorio',
            problema_diabetes = '$diabetes',
            problema_obstérico = '$problemaObstetrico',
            forma_transporte = '$formaTransporte',
            sinais_sintomas = '$sinaisSintomas',
            local_cianose = '$localCianose',
            forma_conducao = '$formaConducao',
            vitima_era = '$vitimaEra',
            dec_transporte = '$decisaoTransporte',
            pressao_arterial = '$pressaoArterial',
            pulso = '$pulso',
            respiracao = '$respiracao',
            saturacao = '$saturacao',
            temperatura = $temperatura,
            perfusao = '$perfusao',
            quilometragem_final = $quilometragemFinal,
            hospital = '$hospital',
            hch = '$hch',
            num_usb = $numUSB
            WHERE ocorrencia_id = :id";

    $stmt = $dbh->connect()->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    if($stmt) {
        header("Location: ../../dist/adm/visualizar.php?success=ocorrencia-alterada&id=$id");
        exit();
    } else {
        header("Location: ../../dist/adm/visualizar.php?error=erro-alterar-ocorrencia&id=$id");
        exit();
    }
} else {
    $procedimentosRealizados = $_POST["Procedimentos_Realizados"];
    $imobilizacoes = $_POST["Imobilizações"];
    $colar = $_POST["Colar"];
    $tamanhoColar = $_POST["Tamanho_do_Colar"];
    $lpm = $_POST["LPM"];
    $meiosAuxiliares = $_POST["Meios_Auxiliares"];
    $ataduras = $_POST["Ataduras"];
    $cateterTpOculos = $_POST["Cateter/Tampão_Ocular"];
    $compressaComum = $_POST["Compressa_Comum"];
    $kitTipo = $_POST["Tipo_de_Kit"];
    $kitQtd = $_POST["Quantidade_de_Kit"];
    $luvas = $_POST["Luvas"];
    $mascaras = $_POST["Máscaras"];
    $mantaAluminizada = $_POST["Manta_Aluminizada"];
    $pasDea = $_POST["Pás/DEA"];
    $sondaAsp = $_POST["Sonda_ASP"];
    $soroFisiologico = $_POST["Soro_Fisiológico"];
    $talasTipo = $_POST["Tipo_de_Talas"];
    $talasQtd = $_POST["Quantidade_de_Talas"];
    $baseEstabilizador = $_POST["Base_Estabilizadora"];
    $colarTipo = $_POST["Tipo_de_Colar"];
    $colarQtd = $_POST["Quantidade_de_Colar"];
    $coxins = $_POST["Coxins"];
    $kedTipo = $_POST["Tipo_de_KED"];
    $ketQtd = $_POST["Quantidade_de_KET"];
    $macaRigida = $_POST["Maca_Rígida"];
    $ttfTipo = $_POST["Tipo_de_TTF"];
    $qtdTtf = $_POST["Quantidade_de_TTF"];
    $tiranteAranha = $_POST["Tirante_de_Aranha"];
    $tiranteCabeca = $_POST["Tirante_de_Cabeça"];
    $canula = $_POST["Cânula"];
    $observacoes = $_POST["Observações"];

    $sql = "UPDATE historico SET
        procedimentos_efetuados = '$procedimentosRealizados',
        imobilizacoes = '$imobilizacoes',
        colar = '$colar',
        tamanho_colar = '$tamanhoColar',
        lpm = '$lpm',
        meios_auxiliares = '$meiosAuxiliares',
        ataduras = '$ataduras',
        cateter_tp_oculos = '$cateterTpOculos',
        compressa_comum = '$compressaComum',
        kit_tipo = '$kitTipo',
        kit_qtd = '$kitQtd',
        luvas = '$luvas',
        mascaras = '$mascaras',
        manta_aluminizada = '$mantaAluminizada',
        pas_dea = '$pasDea',
        sonda_asp = '$sondaAsp',
        soro_fisiologico = '$soroFisiologico',
        talas_tipo = '$talasTipo',
        talas_qtd = '$talasQtd',
        base_establizador = '$baseEstabilizador',
        colar_tipo = '$colarTipo',
        colar_qtd = '$colarQtd',
        coxins = '$coxins',
        ked_tipo = '$kedTipo',
        ket_qtd = '$ketQtd',
        maca_rigida = '$macaRigida',
        ttf_tipo = '$ttfTipo',
        qtd_ttf = '$qtdTtf',
        tirante_aranha = '$tiranteAranha',
        tirante_cabeca = '$tiranteCabeca',
        canula = '$canula',
        observacoes = '$observacoes'
        WHERE ocorrencia_referente = :id";

    $stmt = $dbh->connect()->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    if($stmt) {
        header("Location: ../../dist/adm/visualizar.php?success=historico-alterado&id=$id");
        exit();
    } else {
        header("Location: ../../dist/adm/visualizar.php?error=erro-alterar-historico&id=$id");
        exit();
    }
}