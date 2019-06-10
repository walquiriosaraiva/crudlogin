create table contatos (
    id int unsigned auto_increment primary key,
    nome varchar(80) not null,
    telefone varchar(20) default null,
    email varchar(80) default null
);

create table usuario (
    id int unsigned auto_increment primary key,
    usuario varchar(200) not null,
    senha varchar(200) not null,
    cadastro timestamp,
    situacao char(1),
    email varchar(200),
    tipo char(1) comment 'A - Administrador, C - Consulta'
);

/*senha: teste*/
insert into usuario (usuario,senha,cadastro,situacao,email,tipo) value
('walquirio','$1$S4ph9DZq$ZXtdgij3HMonSFWc0cCim1',now(),'A','walquiriosaraiva@gmail.com','A');