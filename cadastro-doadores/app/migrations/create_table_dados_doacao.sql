USE cadastro_doador;
CREATE TABLE dados_doacao(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    doador_id INTEGER,
    intervalo_doacao ENUM('Único', 'Bimestral', 'Semestral', 'Anual'),
    valor_doacao DECIMAL(10,2),
    forma_pagamento ENUM('Débito', 'Crédito'),
    banco VARCHAR(100) DEFAULT NULL,
    agencia CHAR(6) DEFAULT NULL,
    conta CHAR(14) DEFAULT NULL,
    bandeira_cartao VARCHAR(20) DEFAULT NULL,
    cartao VARCHAR(20) DEFAULT NULL,
    seis_primeiros_digitos CHAR(6) DEFAULT NULL ,
    quatros_ultimos_digitos CHAR(4) DEFAULT NULL ,
    FOREIGN KEY (doador_id) REFERENCES doadores(id) ON DELETE CASCADE
);