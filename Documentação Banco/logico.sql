CREATE TABLE empresas (
id_empresa int(2) not null AUTO_INCREMENT PRIMARY KEY,
cnpj int(14) unique not null,
nome varchar(40) not null
);

CREATE TABLE veiculos (
id_veiculo int(4) not null AUTO_INCREMENT PRIMARY KEY,
cnpj int(14),
cod_empresa int(2),
placa varchar(7) unique not null,
marca varchar(20) not null,
modelo varchar(20) not null,
ano int(4) not null,
cor varchar(20) not null,
FOREIGN KEY(cnpj) REFERENCES empresas (id_empresa),
FOREIGN KEY(cod_empresa) REFERENCES empresas (id_empresa)
);

CREATE TABLE enderecos(
id_end_passageiro int(5) not null AUTO_INCREMENT PRIMARY KEY,
passageiro_id int(5),
cep int(7) unique not null,
estado varchar(20) not null,
cidade varchar(50) not null,
rua varchar(50) not null,
numero int(6) not null,
complemento varchar(40) not null
);

CREATE TABLE motoristas (
id_motorista int(3) not null AUTO_INCREMENT PRIMARY KEY,
emp_idempresa int(2),
user_iduser int(8),
cnh int(8) unique not null,
ativo int(1) not null,
FOREIGN KEY(emp_idempresa) REFERENCES empresas (id_empresa)
);

CREATE TABLE passageiros (
id_passageiro int(5) not null AUTO_INCREMENT PRIMARY KEY,
emp_cod_empresa int(2),
end_idpassageiro int(5),
matricula int(10) unique not null,
curso varchar(40) not null,
turma varchar(40) not null,
FOREIGN KEY(emp_cod_empresa) REFERENCES empresas (id_empresa),
FOREIGN KEY(end_idpassageiro) REFERENCES enderecos (id_end_passageiro)
);

CREATE TABLE corridas (
id_corrida int(10) PRIMARY KEY,
passageiro_id_passageiro int(5),
veiculo_id_veiculo int(4),
motorista_id_motorista int(3),
data date not null,
horario_ida time not null,
horario_volta date not null,
FOREIGN KEY(passageiro_id_passageiro) REFERENCES passageiros (id_passageiro),
FOREIGN KEY(veiculo_id_veiculo) REFERENCES veiculos (id_veiculo),
FOREIGN KEY(motorista_id_motorista) REFERENCES motoristas (id_motorista)
);

CREATE TABLE usuarios (
id_usuario int(8) not null AUTO_INCREMENT PRIMARY KEY,
tipuser_tip_user int(1),
cpf int(11) unique not null,
rg int(7) unique not null,
email varchar(40) unique not null,
nome varchar(40) not null,
senha varchar(20) not null,
sobrenome varchar(15) not null
);

CREATE TABLE tipo_usuarios (
tip_user int(1) not null AUTO_INCREMENT PRIMARY KEY,
descricao varchar(40) not null
);

ALTER TABLE enderecos ADD FOREIGN KEY(passageiro_id) REFERENCES passageiros (id_passageiro);
ALTER TABLE motoristas ADD FOREIGN KEY(user_iduser) REFERENCES usuarios (id_usuario);
ALTER TABLE usuarios ADD FOREIGN KEY(tipuser_tip_user) REFERENCES tipo_usuarios (tip_user);

