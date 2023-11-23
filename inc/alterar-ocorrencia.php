<?php
require_once "class/dbh.class.php";
$id = $_GET["id"];
$dbh = new Dbh();

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
$numDesp = $_POST["num_desp"];
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
    header("Location: ../dist/adm/visualizar.php?success=ocorrencia-alterada&id=$id");
    exit();
} else {
    header("Location: ../dist/adm/visualizar.php?error=erro-alterar-ocorrencia&id=$id");
    exit();
}