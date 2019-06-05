/*Tipo de telefone*/

INSERT INTO tb_tipo_tel (tip_tel_tipo) VALUES 
("Residencial"),("Celular"),("Comercial");

/* Generos*/

INSERT INTO tb_genero (gen_genero) VALUES 
('Açao'),('Fantasia'),('Ficcao Cientifica'),
('Terror'),('Aventura'),('Drama'),('Infantil');

/*Estado do livro*/

INSERT INTO tb_estado_livro (est_liv_estado) VALUES
('Conservado'),('Pouco Danificado'),('Danificado');

/*Funcionario*/

INSERT INTO tb_funcionario (fun_nome, fun_sexo, fun_email, fun_password)
VALUES ('Adriana Valverde','F','valverde@gmail.com','123');

INSERT INTO tb_funcionario (fun_nome, fun_sexo, fun_email, fun_password)
VALUES ('Lucas Cascao','M','lucas@gmail.com','123');

INSERT INTO tb_funcionario (fun_nome, fun_sexo, fun_email, fun_password)
VALUES ('Daniella Bassi','F','daniella@gmail.com','123');

INSERT INTO tb_funcionario (fun_nome, fun_sexo, fun_email, fun_password)
VALUES ('Guilherme Landim','M','guilherme@gmail.com','123');

INSERT INTO tb_funcionario (fun_nome, fun_sexo, fun_email, fun_password)
VALUES ('Vinicius Siqueira','M','vinicius@gmail.com','123');

INSERT INTO tb_funcionario (fun_nome, fun_sexo, fun_email, fun_password)
VALUES ('Adriana Higushi','F','adriana@gmail.com','123');

/*Leitor*/

INSERT INTO tb_leitor (lei_nome, lei_sexo, lei_email, lei_dtnasc)
VALUES ('Lucas Cascao','M','lucas@gmail.com','1995-09-16');

INSERT INTO tb_leitor (lei_nome, lei_sexo, lei_email, lei_dtnasc)
VALUES ('Adriana Valverde','F','valverde@gmail.com','1970-02-27');

INSERT INTO tb_leitor (lei_nome, lei_sexo, lei_email, lei_dtnasc)
VALUES ('Daniella Bassi','F','daniella@gmail.com','2000-11-11');

INSERT INTO tb_leitor (lei_nome, lei_sexo, lei_email, lei_dtnasc)
VALUES ('Guilherme Landim','M','guilherme@gmail.com','1996-05-06');

INSERT INTO tb_leitor (lei_nome, lei_sexo, lei_email, lei_dtnasc)
VALUES ('Vinicius Siqueira','M','vinicius@gmail.com','2000-12-09');

INSERT INTO tb_leitor (lei_nome, lei_sexo, lei_email, lei_dtnasc)
VALUES ('Adriana Higushi','F','adriana@gmail.com','1982-07-20');

INSERT INTO tb_leitor (lei_nome, lei_sexo, lei_email, lei_dtnasc)
VALUES ('Daniel Yoshio','M','daniel@gmail.com','1998-03-19');

/*Endereco*/

INSERT INTO tb_endereco (end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, end_ibge, tb_lei_id)
VALUES ('Passos','876','Cidade Edson','Suzano','SP','08665410','52652625',1);

INSERT INTO tb_endereco (end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, end_ibge, tb_lei_id)
VALUES ('Santo Padre','777','Paraiso','Reino dos Céus','SP','08665410','52652625',2);

INSERT INTO tb_endereco (end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, end_ibge, tb_lei_id)
VALUES ('Jacinto','69','Terra dos Perdidos','Itaim Paulista','SP','08665410','52652625',3);

INSERT INTO tb_endereco (end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, end_ibge, tb_lei_id)
VALUES ('Josiscleide','1203','Centro','Mogi das Cruzes','SP','08665410','52652625',4);

INSERT INTO tb_endereco (end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, end_ibge, tb_lei_id)
VALUES ('Anteteguimon','185','Jardim Militar','Suzano','SP','08665410','52652625',5);

INSERT INTO tb_endereco (end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, end_ibge, tb_lei_id)
VALUES ('Araguaia','254','Amazon','Biritiba','SP','08665410','52652625',6);

INSERT INTO tb_endereco (end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, end_ibge, tb_lei_id)
VALUES ('São Gonçalvo','523','Lar das Flores','Ferraz de Vasconcelos','SP','08665410','52652625',7);

/*Telefone*/

INSERT INTO tb_telefone (tel_numero, tb_tip_tel_id, tb_lei_id)
VALUES ('11975168438',2,1);

INSERT INTO tb_telefone (tel_numero, tb_tip_tel_id, tb_lei_id)
VALUES ('11975167845',1,2);

INSERT INTO tb_telefone (tel_numero, tb_tip_tel_id, tb_lei_id)
VALUES ('11975362538',2,3);

INSERT INTO tb_telefone (tel_numero, tb_tip_tel_id, tb_lei_id)
VALUES ('11974586338',3,4);

INSERT INTO tb_telefone (tel_numero, tb_tip_tel_id, tb_lei_id)
VALUES ('11985260031',1,5);

INSERT INTO tb_telefone (tel_numero, tb_tip_tel_id, tb_lei_id)
VALUES ('11923620038',1,6);

INSERT INTO tb_telefone (tel_numero, tb_tip_tel_id, tb_lei_id)
VALUES ('11989650538',3,7);


/*Autor*/

INSERT INTO tb_autor (aut_nome,aut_dtnasc, aut_sexo)
VALUES ('J. K. Rowling','1968-02-23','F');

INSERT INTO tb_autor (aut_nome,aut_dtnasc, aut_sexo)
VALUES ('Stephen King','1968-02-23','F');

INSERT INTO tb_autor (aut_nome,aut_dtnasc, aut_sexo)
VALUES ('Rick Riordan','1968-02-23','F');

INSERT INTO tb_autor (aut_nome,aut_dtnasc, aut_sexo)
VALUES ('Christopher Paolini','1968-02-23','F');

INSERT INTO tb_autor (aut_nome,aut_dtnasc, aut_sexo)
VALUES ('J. R. R. Tolkien','1968-02-23','F');

INSERT INTO tb_autor (aut_nome,aut_dtnasc, aut_sexo)
VALUES ('George R. R. Martin','1968-02-23','F');

/*Editoras*/

INSERT INTO tb_editora(edi_nome)
VALUES ('Panini');

INSERT INTO tb_editora(edi_nome)
VALUES ('Arqueiro');

INSERT INTO tb_editora(edi_nome)
VALUES ('Brinque Book');

INSERT INTO tb_editora(edi_nome)
VALUES ('Libre');

INSERT INTO tb_editora(edi_nome)
VALUES ('Gente');

INSERT INTO tb_editora(edi_nome)
VALUES ('Patuá');

/*Livro*/

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Eragon','2002-03-28','3',1,1,4,3,20,20);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Eldest','2002-03-28','3',1,2,4,3,4,4);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Brisingr','2002-03-28','3',1,3,4,3,3,3);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Herança','2002-03-28','3',1,4,1,1,5,5);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Harry Potter e a Pedra Filosofal','2002-03-28','3',1,5,1,3,8,8);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Harry Potter e a Camara Secreta','2002-03-28','3',1,6,1,3,20,20);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Harry Potter e o Prisioneiro de Askaban','2002-03-28','3',1,1,1,3,20,20);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Percy Jackson e o Ladrão de Raios','2002-03-28','3',1,2,3,3,20,20);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Percy Jackson e o Mar de Monstro','2002-03-28','3',1,3,3,3,20,20);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Percy Jackson e a Maldição de Titã','2002-03-28','3',1,4,3,3,20,20);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('O Hobbit','2002-03-28','3',1,5,5,3,20,20);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Senhor dos Aneis - A Sociedade do Anel','2002-03-28','3',1,6,5,3,20,20);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('It - A Coisa','2002-03-28','3',1,5,2,4,20,20);

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('As Cronicas de Gelo e Fogo: A Guerra dos Tronos','2002-03-28','3',1,4,6,1,20,20);

/*Emprestimo*/

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (2,2,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 2;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (3,3,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 3;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (4,4,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 4;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (5,5,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 5;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (6,6,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 6;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (7,7,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 7;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (6,8,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 8;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (5,9,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 9;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (4,10,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 10;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (3,11,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 11;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (2,12,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 12;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (1,13,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 13;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (2,14,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 14;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (3,1,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 1;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (4,2,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 2;

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (5,10,1,'2019-05-02','2019-05-12');

UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_id = 10;