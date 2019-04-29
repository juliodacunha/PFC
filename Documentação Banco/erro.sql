-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE user (
nome varchar(40),
senha varchar(20),
sobrenome varchar(20),
email varchar(40),
cpf int(11),
rg int(7),
PRIMARY KEY(email,cpf,rg)
)

CREATE TABLE passageiro (
id_passageiro int(5) PRIMARY KEY,
curso varchar(40),
turma varchar(40),
matricula int(10),
user_cpf int(11),
user_email varchar(40),
user_rg int(7),
FOREIGN KEY(user_rg,user_cpf,,) REFERENCES user (email,cpf,rg)
)

CREATE TABLE motorista (
cnh int(8),
id_motorista int(3),
ativo int(1),
user_email varchar(40),
user_cpf int(11),
user_rg int(7),
emp_cnpj int(14),
emp_cod_empresa int(2),
PRIMARY KEY(cnh,id_motorista),
FOREIGN KEY(user_rg,,,) REFERENCES user (email,cpf,rg)
)

CREATE TABLE empresa (
nome varchar(40),
cnpj int(14),
cod_empresa int(2),
PRIMARY KEY(cnpj,cod_empresa)
)

CREATE TABLE veiculo (
marca varchar(40),
modelo varchar(40),
placa varchar(7),
cod_veiculo int(5),
ano int(4),
cor varchar(20),
emp_cod_empresa int(2),
emp_cnpj int(14),
PRIMARY KEY(placa,cod_veiculo),
FOREIGN KEY(emp_cnpj,emp_cod_empresa,) REFERENCES empresa (cnpj,cod_empresa)
)

CREATE TABLE end_passageiro (
cep int(7),
estado varchar(20),
cidade varchar(50),
rua varchar(50),
id_passageiro int(5),
numero int(6),
complemento varchar(40),
FOREIGN KEY(id_passageiro) REFERENCES passageiro (id_passageiro)
)

CREATE TABLE Relação_2+corrida (
id_passageiro Texto(1),
placa Texto(1),
cod_veiculo Texto(1),
cnh Texto(1),
id_motorista Texto(1),
data Texto(1),
id_corrida Texto(1),
veiculo_cod_veiculo Texto(1),
horario_ida Texto(1),
horario_volta Texto(1),
placa_van Texto(1),
PRIMARY KEY(id_passageiro,placa,cod_veiculo,cnh,id_motorista,id_corrida,placa_van)
)

CREATE TABLE tip_user (
tip_user Texto(1)
)

ALTER TABLE motorista ADD FOREIGN KEY(emp_cod_empresa,,) REFERENCES empresa (cnpj,cod_empresa)
