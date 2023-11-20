-- --------------------------------------------------------

-- snf_bombeiros
-- host local
-- estrutura das tabelas:

-- --------------------------------------------------------

/*
== BANCO DE DADOS:

-  copiar / importar esse arquivo para criar o banco de dados
-  antes de utilizar a aplicação:
*/

CREATE DATABASE snf_bombeiros;
USE snf_bombeiros;

/*
== TABELA DE SOCORRISTAS:

-  nome do socorrista;
-  senha do socorrista;
-  numero fibra (identificador);
-  se o socorrista e um cmdt(comandante);
-  cdmt = administrador;
-  socorrista / adm foto de perfil

*/

CREATE TABLE usuarios_socorristas (
    usuarios_id INT PRIMARY KEY AUTO_INCREMENT,
    usuarios_username VARCHAR(90) NOT NULL,
    usuarios_pwd LONGTEXT NOT NULL,
    usuarios_num_fibra INT(6) NOT NULL,
    usuarios_e_cmdt VARCHAR(3) NOT NULL,
    usuarios_cmdt_cod INT(6) NOT NULL,
    usuarios_foto_perfil MEDIUMBLOB
);

CREATE TABLE usuarios_medicos (
    medicos_id INT PRIMARY KEY AUTO_INCREMENT,
    medicos_nome VARCHAR(90) NOT NULL,
    medicos_cpf VARCHAR(14) NOT NULL,
    medicos_pwd LONGTEXT NOT NULL,
    medicos_email VARCHAR(90) NOT NULL
);

-- EQUIPES:

CREATE TABLE equipes (
    equipe_id INT PRIMARY KEY AUTO_INCREMENT,
    equipe_nome VARCHAR(90) NOT NULL,
    equipe_motorista VARCHAR(90) NOT NULL,
    equipe_primeiro_socorrista VARCHAR(90) NOT NULL,
    equipe_segundo_socorrista VARCHAR(90) NOT NULL,
    equipe_terceiro_socorrista VARCHAR(90) NOT NULL,
    equipe_demandante VARCHAR(90) NOT NULL
);

CREATE TABLE equipes_usuarios (
    equipe_id INT,
    usuario_id INT,
    PRIMARY KEY (equipe_id, usuario_id),
    FOREIGN KEY (equipe_id) REFERENCES equipes(equipe_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios_socorristas(usuarios_id)
);

/*
== TABELA DE NOTÍCIAS:

-  titulo da noticia;
-  se comentarios estao habilitados;
-  comentarios da noticia;
-  imagem da noticia;
-  data da notícia;
-  criador da notícia;
-  conteudo da noticia

*/

CREATE TABLE alertas_e_noticias (
    noticia_id INT PRIMARY KEY AUTO_INCREMENT,
    noticia_nome VARCHAR(255) NOT NULL,
    noticia_conteudo LONGTEXT,
    noticia_imagem MEDIUMBLOB NOT NULL,
    data_noticia DATE NOT NULL,
    noticia_comentario_habilitado VARCHAR(3) NOT NULL,
    noticia_comentario LONGTEXT,
    noticia_criador INT,
    FOREIGN KEY (noticia_criador) REFERENCES usuarios_socorristas(usuarios_id)
);

CREATE TABLE snf_hospitais (
    hospital_id INT PRIMARY KEY AUTO_INCREMENT
);

/*
== TABELA DO ACOMPANHANTE:
*/

CREATE TABLE paciente_acompanhante (
    acompanhante_id INT PRIMARY KEY AUTO_INCREMENT,
    acompanhante_nome VARCHAR(90),
    acompanhante_cpf INT(11),
    acompanhante_telefone INT,
    acompanhante_idade INT(3)
);

/*
== TABELA DO PACIENTE:

-  nome do paciente;
-  gênero do paciente;
-  cpf do paciente;
-  idade do paciente;
-  n° telefone do paciente;
-  se tem acompanhante / se tiver chave estrangeira do acompanhante;
-  hospital que foi encaminhado.

*/

CREATE TABLE paciente_atendido (
    paciente_id INT PRIMARY KEY AUTO_INCREMENT,
    paciente_nome VARCHAR(90),
    paciente_idade INT(3),
    paciente_cpf INT(11),
    paciente_genero VARCHAR(10),
    paciente_telefone INT,
    paciente_possui_acompanhante VARCHAR(3),
    paciente_acompanhante INT,
    paciente_encaminhado VARCHAR(3),
    paciente_hospital INT,
    FOREIGN KEY (paciente_hospital) REFERENCES snf_hospitais(hospital_id),
    FOREIGN KEY (paciente_acompanhante) REFERENCES paciente_acompanhante(acompanhante_id)
);

/*
== TABELA DA OCORRENCIA:

-  cabecalho da ocorrencia;
-  tipo da ocorrencia;
-  problemas suspeitos;
-  fotos da ocorrencia;

*/

-- PARTES DA OCORRÊNCIA:

CREATE TABLE cabecalho_ocorrencia (
    cabecalho_id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE tipo_ocorrencia (
    tp_ocorrencia_id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE problemas_sus_ocorrencia (
    prob_sus_id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE ocorrencia (
    ocorrencia_id INT PRIMARY KEY AUTO_INCREMENT,
    fotos_ocorrencia MEDIUMBLOB,
    ocorrencia_paciente INT,
    ocorrencia_cabecalho INT,
    ocorrencia_tipo INT,
    ocorrencia_prob_sus INT,
    FOREIGN KEY (ocorrencia_paciente) REFERENCES paciente_atendido(paciente_id),
    FOREIGN KEY (ocorrencia_cabecalho) REFERENCES cabecalho_ocorrencia(cabecalho_id),
    FOREIGN KEY (ocorrencia_tipo) REFERENCES tipo_ocorrencia(tp_ocorrencia_id),
    FOREIGN KEY (ocorrencia_prob_sus) REFERENCES problemas_sus_ocorrencia(prob_sus_id)
);