create table cooperativa (
	cooperativa_id int primary key AUTO_INCREMENT,
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
);

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_email VARCHAR(50) NOT NULL,
    user_password VARCHAR(50) NOT NULL,
    user_name VARCHAR(50) NOT NULL,
    user_cep VARCHAR(50) NOT NULL,
    user_logradouro VARCHAR(50) NOT NULL,
    user_bairro VARCHAR(50) NOT NULL,
    user_localidade VARCHAR(50) NOT NULL,
    user_uf VARCHAR(2) NOT NULL,
    user_complemento VARCHAR(50) NOT NULL,
    user_cpf VARCHAR(50) NOT NULL,
    user_tel VARCHAR(50) NOT NULL,
    user_photo BLOB,
    cooperativa_id INT NOT NULL,
    FOREIGN KEY (cooperativa_id) REFERENCES cooperativa(cooperativa_id)
);

create table ponto (
	ponto_id int primary key AUTO_INCREMENT,
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
);


-- Para testes:

INSERT INTO cooperativa (cooperativa_id, cooperativa_name, cooperativa_cnpj, cooperativa_cep, cooperativa_bairro, cooperativa_logradouro, cooperativa_localidade, cooperativa_uf, cooperativa_complemento, cooperativa_tel, vidro, bateria, metal, papel, plastico)
VALUES (1, 'Nome da Cooperativa', '123456789', '12345-678', 'Bairro da Cooperativa', 'Rua da Cooperativa', 'Localidade da Cooperativa', 'UF', 'Complemento da Cooperativa', 'Telefone da Cooperativa', true, false, true, false, true);