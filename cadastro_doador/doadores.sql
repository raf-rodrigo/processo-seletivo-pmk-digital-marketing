create table if not exists doadores
(
    id              int auto_increment
        primary key,
    nome            varchar(100) not null,
    email           varchar(100) not null,
    cpf             varchar(16)  not null,
    telefone        char(15)     not null,
    data_nascimento date         not null,
    data_cadastro   date         not null,
    cep             char(12)     not null,
    logradouro      varchar(100) not null,
    numero          char(10)     null,
    complemento     varchar(30)  null,
    bairro          varchar(50)  not null,
    cidade          varchar(50)  not null,
    estado          char(2)      not null,
    constraint cpf
        unique (cpf),
    constraint email
        unique (email)
);

