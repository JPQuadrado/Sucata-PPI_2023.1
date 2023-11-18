create table cooperativa (
	cooperativa_id int primary key,
	cooperativa_name varchar(50) not null,
	cooperativa_cnpj varchar(50) not null,
	cooperativa_cep varchar(50) not null,
	cooperativa_bairro varchar(50) not null,
	cooperativa_logradouro varchar(50) not null,
	cooperativa_localidade varchar(50) not null,
	cooperativa_uf varchar(2) not null,
	cooperativa_complemento varchar(50) not null,
	cooperativa_tel varchar(50) not null,
	vidro bool not null,
	bateria bool not null,
	metal bool not null,
	papel bool not null,
	plastico bool not null
)

CREATE table users (
	user_id int primary key,
	user_email varchar(50) not null,
	user_password varchar(50) not null,
	user_name varchar(50) not null,
	user_cep varchar(50) not null,
	user_logradouro varchar(50) not null,
	user_bairro varchar(50) not null,
	user_localidade varchar(50) not null,
	user_uf varchar(2) not null,
	user_complemento varchar(50) not null,
	user_cpf varchar(50) not null,
	user_tel varchar(50) not null,
	user_photo blob,
	cooperativa_id int not null,
	foreign key (`cooperativa_id`) references cooperativa(cooperativa_id)
);

create table ponto (
	ponto_id int primary key,
	ponto_nome varchar(50) not null,
	ponto_cep varchar(50) not null,
	ponto_uf varchar(50) not null,
	ponto_localidade varchar(50) not null,
	ponto_complemento varchar(50) not null,
	ponto_logradouro varchar(50) not null,
	vidro bool not null,
	bateria bool not null,
	metal bool not null,
	papel bool not null,
	plastico bool not null
)


-- Para testes:

INSERT INTO cooperativa (cooperativa_id, cooperativa_name, cooperativa_cnpj, cooperativa_cep, cooperativa_bairro, cooperativa_logradouro, cooperativa_localidade, cooperativa_uf, cooperativa_complemento, cooperativa_tel, vidro, bateria, metal, papel, plastico)
VALUES (1, 'Nome da Cooperativa', '123456789', '12345-678', 'Bairro da Cooperativa', 'Rua da Cooperativa', 'Localidade da Cooperativa', 'UF', 'Complemento da Cooperativa', 'Telefone da Cooperativa', true, false, true, false, true);