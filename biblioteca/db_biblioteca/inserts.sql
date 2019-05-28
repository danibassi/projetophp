INSERT INTO tb_tipo_tel (tip_tel_tipo) VALUES 
("Residencial"),("Celular"),("Comercial");

INSERT INTO tb_genero (gen_genero) VALUES 
("Açao"),("Fantasia"),("Ficcao Cientifica"),
("Terror"),("Aventura"),("Drama"),("Infantil");

INSERT INTO tb_estado_livro (est_liv_estado) VALUES
("Conservado"),("Pouco Danificado"),("Danificado");

INSERT INTO tb_funcionario (fun_nome, fun_sexo, fun_email, fun_password)
VALUES ('Adriana Valverde','F','valverde@gmail.com','123');

INSERT INTO tb_leitor (lei_nome, lei_sexo, lei_email, lei_dtnasc)
VALUES ('Lucas Cascao','M','lucas@gmail.com','1995-09-16');

INSERT INTO tb_endereco (end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, end_ibge, tb_lei_id)
VALUES ('Passos','876','Cidade Edson','Suzano','SP','08665410','52652625',1);

INSERT INTO tb_telefone (tel_numero, tb_tip_tel_id, tb_lei_id)
VALUES ('11975160038',2,1);

INSERT INTO tb_autor (aut_nome,aut_dtnasc, aut_sexo)
VALUES ('J. K. Rowling','1968-02-23','F');

INSERT INTO tb_editora(edi_nome)
VALUES ('Panini');

INSERT INTO tb_livro (liv_nome,liv_ano_publicacao, liv_edicao, tb_est_liv_id,tb_edi_id, tb_aut_id, tb_gen_id,liv_quantidade,liv_qntd_disponivel)
VALUES ('Eragon','2002-03-28','3',1,1,1,1,20,20);

INSERT INTO tb_emprestimo (tb_lei_id, tb_liv_id, tb_fun_id, emp_data, emp_data_devolucao)
VALUES (1,2,1,'2019-05-02','2019-05-12')