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
    noticia_conteudo VARCHAR,
    noticia_imagem MEDIUMBLOB NOT NULL,
    data_noticia DATE NOT NULL,
    noticia_comentario_habilitado VARCHAR(3) NOT NULL,
    noticia_comentario LONGTEXT,
    noticia_criador INT,
    FOREIGN KEY (noticia_criador) REFERENCES usuarios_socorristas(usuarios_id)
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
== TABELA DO ACOMPANHANTE:
*/

CREATE TABLE paciente_acompanhante (
    acompanhante_id INT PRIMARY KEY AUTO_INCREMENT,
    acompanhante_nome VARCHAR,
    acompanhante_cpf INT(11)
    acompanhante_telefone INT,
    acompanhante_idade INT(3)
);

CREATE TABLE snf_hospitais (
    hospital_id INT PRIMARY KEY AUTO_INCREMENT
);

/*
== TABELA DA OCORRENCIA:

-  cabecalho da ocorrencia;
-  tipo da ocorrencia;
-  problemas suspeitos;
-  fotos da ocorrencia;

*/

CREATE TABLE ocorrencia (
    ocorrencia_id INT PRIMARY KEY AUTO_INCREMENT,
    fotos_ocorrencia MEDIUMBLOB,
    ocorrencia_paciente INT,
    FOREIGN KEY (ocorrencia_paciente) REFERENCES paciente_atendido(paciente_id)
);

CREATE TABLE cabecalho_ocorrencia (

);

CREATE TABLE tipo_ocorrencia (

);

CREATE TABLE problemas_sus_ocorrencia (

);