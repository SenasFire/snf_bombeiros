CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(90),
    pwd VARCHAR(15),
    user_data_nascimento DATE
),

INSERT INTO `users` (`username`, `pwd`, `user_data_nascimento`)
VALUES
('Paulo', 'abc123', '2023-09-24'),
('Lana', 'lanafranca', '2023-03-19')

CREATE TABLE usuarios_socorristas (
    usuarios_id INT PRIMARY KEY AUTO_INCREMENT,
    usuarios_username VARCHAR(90) NOT NULL,
    usuarios_pwd VARCHAR(45) NOT NULL,
    usuarios_num_fibra INT(6) NOT NULL,
    usuarios_e_cmdt VARCHAR(3) NOT NULL,
    usuarios_cmdt_cod INT(6) NOT NULL
)