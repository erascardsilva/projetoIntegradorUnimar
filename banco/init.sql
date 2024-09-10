/*Criação do banco de dados do projeto... */

CREATE DATABASE IF NOT EXISTS projintegrador;

USE projintegrador;

CREATE TABLE IF NOT EXISTS suggestions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    whatsapp VARCHAR(20),
    suggestion_type ENUM('Sugestao', 'Critica') NOT NULL,
    suggestion TEXT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
