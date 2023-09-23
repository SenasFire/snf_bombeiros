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