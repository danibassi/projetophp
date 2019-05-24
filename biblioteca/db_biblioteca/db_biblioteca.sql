CREATE DATABASE db_biblioteca;

CREATE TABLE tb_autor (
    aut_id              INT PRIMARY KEY auto_increment,
    aut_dtnasc          DATE NOT NULL,
    aut_nome            VARCHAR(70) NOT NULL,
    aut_sexo            CHAR(1) NOT NULL
);

CREATE TABLE tb_editora (
    edi_id     INT PRIMARY KEY auto_increment,
    edi_nome   VARCHAR(50) NOT NULL
);

CREATE TABLE tb_emprestimo (
    emp_id                  INT PRIMARY KEY auto_increment,
    tb_lei_id               INT NOT NULL,
    tb_liv_id               INT NOT NULL,
    tb_fun_id               INT NOT NULL,
    emp_data                DATE NOT NULL,
    emp_data_devolucao      DATE NOT NULL,
    emp_data_entregue       DATE NOT NULL
);

CREATE TABLE tb_endereco (
    end_id       INT PRIMARY KEY auto_increment,
    end_rua      VARCHAR(100) NOT NULL,
    end_numero   VARCHAR(10) NOT NULL,
    end_bairro   VARCHAR(100) NOT NULL,
    end_cidade   VARCHAR(50) NOT NULL,
    end_estado   VARCHAR(50) NOT NULL,
    end_cep      VARCHAR(10) NOT NULL,
    tb_lei_id    INT NOT NULL
);

CREATE TABLE tb_funcionario (
    fun_id         INT PRIMARY KEY auto_increment,
    fun_nome       VARCHAR(100) NOT NULL,
    fun_sexo       CHAR(1) NOT NULL,
    fun_email      VARCHAR(100) NOT NULL,
    fun_password   VARCHAR(12) NOT NULL
);

CREATE TABLE tb_genero (
    gen_id       INT PRIMARY KEY auto_increment,
    gen_genero   VARCHAR(30) NOT NULL
);

CREATE TABLE tb_leitor (
    lei_id               INT PRIMARY KEY auto_increment,
    lei_nome             VARCHAR(70) NOT NULL,
    lei_email            VARCHAR(100) NOT NULL,
    lei_dtnasc           DATE NOT NULL,
    lei_sexo             CHAR(1) NOT NULL
);

CREATE TABLE tb_livro (
    liv_id              INT PRIMARY KEY auto_increment,
    liv_nome            VARCHAR(100) NOT NULL,
    liv_ano_publicacao  DATE NOT NULL,
    liv_edicao          VARCHAR(3) NOT NULL,
    tb_est_liv_id       INT NOT NULL,
    tb_edi_id           INT NOT NULL,
    tb_aut_id           INT NOT NULL,
    tb_gen_id           INT NOT NULL,
    liv_isbd            VARCHAR(13) NOT NULL,
    liv_capa            VARCHAR(200),
    liv_quantidade      INT NOT NULL;
);

CREATE TABLE tb_estado_livro(
    est_liv_id        INT PRIMARY KEY auto_increment,
    est_liv_estado    VARCHAR(30) NOT NULL
);

CREATE TABLE tb_telefone (
    tel_id                   INT PRIMARY KEY auto_increment,
    tel_numero               VARCHAR(15) NOT NULL,
    tb_tip_tel_id            INT NOT NULL,
    tb_lei_id                INT NOT NULL
);

CREATE TABLE tb_estado(

	est_id INT(11)           PRIMARY KEY AUTO_INCREMENT NOT NULL,
	est_sigla                VARCHAR(2) COLLATE utf8_unicode_ci NOT NULL,
	est_nome                 VARCHAR(72) COLLATE utf8_unicode_ci NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_cidade(
	cid_id                   INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	cid_nome                 VARCHAR(72) COLLATE utf8_unicode_ci NOT NULL,
	cid_cep                  VARCHAR(8) COLLATE utf8_unicode_ci NOT NULL,
	tb_est_id                INT(11) NOT NULL,
	
    FOREIGN KEY(tb_est_id) REFERENCES tb_estado(est_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_tipo_tel (
    tip_tel_id     INT(28) PRIMARY KEY auto_increment,
    tip_tel_tipo   VARCHAR(20) NOT NULL
);

ALTER TABLE tb_emprestimo
    ADD CONSTRAINT tb_emp_tb_fun_fk FOREIGN KEY ( tb_fun_id )
        REFERENCES tb_funcionario ( fun_id )
ON DELETE NO ACTION 
    ON UPDATE no action;

ALTER TABLE tb_emprestimo
    ADD CONSTRAINT tb_emp_tb_lei_fk FOREIGN KEY ( tb_lei_id )
        REFERENCES tb_leitor ( lei_id )
ON DELETE NO ACTION 
    ON UPDATE no action;

ALTER TABLE tb_emprestimo
    ADD CONSTRAINT tb_emp_tb_liv_fk FOREIGN KEY ( tb_liv_id )
        REFERENCES tb_livro ( liv_id )
ON DELETE NO ACTION 
    ON UPDATE no action;

ALTER TABLE tb_livro
    ADD CONSTRAINT tb_liv_tb_aut_fk FOREIGN KEY ( tb_aut_id )
        REFERENCES tb_autor ( aut_id )
ON DELETE NO ACTION 
    ON UPDATE no action;

ALTER TABLE tb_livro
    ADD CONSTRAINT tb_liv_tb_edit_fk FOREIGN KEY ( tb_edi_id )
        REFERENCES tb_editora ( edi_id )
ON DELETE NO ACTION 
    ON UPDATE no action;

ALTER TABLE tb_livro
    ADD CONSTRAINT tb_livro_tb_genero_fk FOREIGN KEY ( tb_gen_id )
        REFERENCES tb_genero ( gen_id )
ON DELETE NO ACTION 
    ON UPDATE no action;

ALTER TABLE tb_livro 
    ADD CONSTRAINT tb_est_liv_fk FOREIGN KEY (tb_est_liv_id) 
        REFERENCES tb_estado_livro(est_liv_id) 
ON DELETE NO ACTION 
    ON UPDATE NO ACTION;

ALTER TABLE tb_telefone
    ADD CONSTRAINT tb_tel_tb_tip_fk FOREIGN KEY ( tb_lei_id )
        REFERENCES tb_leitor ( lei_id )
ON DELETE NO ACTION 
    ON UPDATE no action;

ALTER TABLE tb_telefone
    ADD CONSTRAINT tb_tel_tel_fk FOREIGN KEY ( tb_tip_tel_id )
        REFERENCES tb_tipo_tel ( tip_tel_id )
ON DELETE NO ACTION 
    ON UPDATE no action;

ALTER TABLE tb_endereco
    ADD CONSTRAINT tb_usu_tb_end_fk FOREIGN KEY ( tb_lei_id )
        REFERENCES tb_leitor ( lei_id )
ON DELETE NO ACTION 
    ON UPDATE no action;


# Privileges for `biblioteca`@`localhost`

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, CREATE TEMPORARY TABLES, 
EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER ON *.*
TO 'biblioteca'@'localhost' IDENTIFIED BY PASSWORD '*16FD9BF32A5234F54550BC8610345466FF246243';

