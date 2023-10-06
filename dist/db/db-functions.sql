CREATE DATABASE snf_bombeiros;
USE snf_bombeiros;

CREATE TABLE usuarios_socorristas (
    usuarios_id INT PRIMARY KEY AUTO_INCREMENT,
    usuarios_username VARCHAR(90) NOT NULL,
    usuarios_pwd LONGTEXT NOT NULL,
    usuarios_num_fibra INT(6) NOT NULL,
    usuarios_e_cmdt VARCHAR(3) NOT NULL,
    usuarios_cmdt_cod INT(6) NOT NULL
);

CREATE TABLE alertas_e_noticias (
    noticia_id INT PRIMARY KEY AUTO_INCREMENT,
    noticia_nome VARCHAR(255) NOT NULL,
    noticia_comentario_habilitado VARCHAR(3) NOT NULL,
    noticia_comentario LONGTEXT,
    noticia_imagem MEDIUMBLOB NOT NULL,
    data_noticia DATE NOT NULL
);