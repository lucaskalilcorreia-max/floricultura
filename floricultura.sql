
-- Tabela de clientes
CREATE TABLE IF NOT EXISTS clientes (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
cpf VARCHAR(20) NOT NULL,
rg VARCHAR(20),
telefone VARCHAR(20),
endereco VARCHAR(150)
);

-- Tabela de produtos
CREATE TABLE IF NOT EXISTS produtos (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
tipo VARCHAR(50),
preco DECIMAL(10,2) NOT NULL,
quantidade INT NOT NULL
);

-- Tabela de vendas
CREATE TABLE IF NOT EXISTS vendas (
id INT AUTO_INCREMENT PRIMARY KEY,
id_cliente INT,
data_venda DATE,
FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);

-- Tabela de itens da venda
CREATE TABLE IF NOT EXISTS itens_venda (
id INT AUTO_INCREMENT PRIMARY KEY,
id_venda INT,
id_produto INT,
quantidade INT,
FOREIGN KEY (id_venda) REFERENCES vendas(id),
FOREIGN KEY (id_produto) REFERENCES produtos(id)
);