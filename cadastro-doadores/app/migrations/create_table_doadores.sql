USE cadastro_doador;
CREATE TABLE doadores (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL ,
    email VARCHAR(100) NOT NULL UNIQUE ,
    cpf VARCHAR(16) NOT NULL UNIQUE ,
    telefone CHAR(15) NOT NULL ,
    data_nascimento DATE NOT NULL ,
    data_cadastro DATE NOT NULL ,
    cep CHAR(12) NOT NULL,
    logradouro VARCHAR(100) NOT NULL,
    numero CHAR(10) DEFAULT NULL,
    complemento  VARCHAR(30) DEFAULT NULL,
    bairro VARCHAR(50) NOT NULL ,
    cidade VARCHAR(50) NOT NULL ,
    estado CHAR(2) NOT NULL
);