CREATE TABLE Tb_Usuario (
                ID_Usuario INT(8) NOT NULL auto_increment,
                Nome_Usuario VARCHAR(50),
                CPF VARCHAR(11) NOT NULL,
                email VARCHAR(50),
                Telefone INT,
                Cidade VARCHAR(30) NOT NULL,
                PRIMARY KEY (ID_Usuario)
);


CREATE TABLE Tb_Noticias (
                ID_Noticias VARCHAR(8) NOT NULL,
                Local VARCHAR(150),
                Nacional VARCHAR(150),
                Mundial VARCHAR(150),
                ID_Usuario VARCHAR(11) NOT NULL,
                PRIMARY KEY (ID_Noticias)
);


CREATE TABLE Tb_Anunciante (
                Cod_Anunciante VARCHAR(11) NOT NULL,
                CPF VARCHAR(11) NOT NULL,
                Nome VARCHAR(50) NOT NULL,
                email VARCHAR(50),
                Telefone INT,
                Nome_Empresa VARCHAR(50) NOT NULL,
                Rua VARCHAR(50) NOT NULL,
                Bairro VARCHAR(50),
                Cidade VARCHAR(30) NOT NULL,
                Numero VARCHAR(6) NOT NULL,
                PRIMARY KEY (Cod_Anunciante, CPF)
);


CREATE TABLE Tb_Produtos (
                ID_Produtos VARCHAR(11) NOT NULL,
                Cod_Anunciante VARCHAR(11) NOT NULL,
                CPF VARCHAR(11) NOT NULL,
                Tipo_Produto VARCHAR(30) NOT NULL,
                Valor_Produtos DECIMAL NOT NULL,
                ID_Usuario VARCHAR(11) NOT NULL,
                PRIMARY KEY (ID_Produtos, Cod_Anunciante, CPF)
);


CREATE TABLE Tb_Servico (
                ID_servico VARCHAR(11) NOT NULL,
                Cod_Anunciante VARCHAR(11) NOT NULL,
                CPF VARCHAR(11) NOT NULL,
                Tipo_Servico VARCHAR(30) NOT NULL,
                Valor_Servico DECIMAL NOT NULL,
                ID_Usuario VARCHAR(11) NOT NULL,
                PRIMARY KEY (ID_servico, Cod_Anunciante, CPF)
);
