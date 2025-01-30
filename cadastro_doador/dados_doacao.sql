create table if not exists dados_doacao
(
    id                      int auto_increment
        primary key,
    doador_id               int                                               null,
    intervalo_doacao        enum ('Único', 'Bimestral', 'Semestral', 'Anual') null,
    valor_doacao            decimal(10, 2)                                    null,
    forma_pagamento         enum ('Débito', 'Crédito')                        null,
    banco                   varchar(100)                                      null,
    agencia                 char(6)                                           null,
    conta                   char(14)                                          null,
    bandeira_cartao         varchar(20)                                       null,
    cartao                  varchar(20)                                       null,
    seis_primeiros_digitos  char(6)                                           null,
    quatros_ultimos_digitos char(4)                                           null,
    constraint dados_doacao_ibfk_1
        foreign key (doador_id) references doadores (id)
            on delete cascade
);

create index doador_id
    on dados_doacao (doador_id);

