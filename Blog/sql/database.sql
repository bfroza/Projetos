CREATE DATABASE blog;

USE blog;

-- Tabela Contato
CREATE TABLE Contato (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255),
    Email VARCHAR(255),
    Telefone VARCHAR(20),
    Endereco VARCHAR(255)
);

-- Tabela Categoria
CREATE TABLE Categoria (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255),
    Descricao TEXT
);

-- Tabela Tags
CREATE TABLE Tags (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255)
);

-- Tabela Postagens
CREATE TABLE Postagens (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(255),
    desc_imagem VARCHAR(255),
    autor VARCHAR(255)
    imagem varchar(255) DEFAULT 'imagem.jfif',
    DataDePublicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CategoriaID INT,
    TagsID INT,
    Descricao VARCHAR(500),
    FOREIGN KEY (CategoriaID) REFERENCES Categoria(ID),
    FOREIGN KEY (TagsID) REFERENCES Tags(ID)
);

-- Inserir valores na tabela Categoria
INSERT INTO Categoria (Nome, Descricao) VALUES
    ('Montanhas', 'Categoria relacionada a paisagens montanhosas e picos elevados.'),
    ('Exploração Subaquática', 'Categoria relacionada a atividades de exploração subaquática e ecossistemas marinhos.'),
    ('Viagens de Aventura', 'Categoria relacionada a experiências emocionantes e atividades radicais.'),
    ('Bosques', 'Categoria relacionada a florestas exuberantes e ecossistemas naturais.'),
    ('Quedas D''água', 'Categoria relacionada a cachoeiras majestosas e espetáculos aquáticos.'),
    ('Patrimônio Histórico', 'Categoria relacionada a locais com significado histórico e cultural.'),
    ('Culinária Local', 'Categoria relacionada a experiências culinárias autênticas e pratos tradicionais.'),
    ('Turismo em Metrópoles', 'Categoria relacionada a destinos urbanos e passeios culturais em grandes cidades.'),
    ('Costas e Praias', 'Categoria relacionada a praias deslumbrantes e regiões litorâneas paradisíacas.'),
    ('Preservação Ambiental', 'Categoria relacionada a turismo ecológico, preservação da natureza e sustentabilidade.'),
    ('Arquitetura Histórica', 'Categoria relacionada a locais com arquitetura histórica e monumentos antigos.'),
    ('Observação da Vida Selvagem', 'Categoria relacionada a experiências de observação da vida selvagem e ecoturismo.'),
    ('Turismo Religioso', 'Categoria relacionada a destinos de significado religioso e peregrinações.'),
    ('Destinos Exóticos', 'Categoria para viagens a destinos incomuns e culturas pouco conhecidas.'),
    ('Aventuras no Deserto', 'Categoria para explorar as belezas e desafios dos ambientes desérticos.'),
    ('Ecoturismo Aquático', 'Categoria dedicada a experiências de ecoturismo em ambientes aquáticos.'),
    ('Turismo de Inverno', 'Categoria para destinos e atividades relacionadas ao inverno e esportes na neve.');


-- Inserir valores na tabela Tags
INSERT INTO Tags (Nome) VALUES
    ('Lifestyle'),
    ('Viagem'),
    ('Barco'),
    ('Trilha'),
    ('Tirolesa'),
    ('Rafting'),
    ('Parapente'),
    ('Acampamento'),
    ('Culinária'),
    ('Arte'),
    ('Música'),
    ('Fotografia'),
    ('Esportes Radicais'),
    ('Ciclismo'),
    ('Gastronomia'),
    ('Cinema'),
    ('Aventura'),
    ('Tecnologia'),
    ('Saúde'),
    ('Moda'),
    ('Beleza'),
    ('Animais'),
    ('Natureza'),
    ('Livros'),
    ('História'),
    ('Educação'),
    ('Humor'),
    ('Fitness'),
    ('Comédia'),
    ('Astronomia');







CREATE VIEW visu_categorias AS SELECT  ID, Nome FROM Categoria ORDER BY Nome ;

CREATE VIEW visu_tags AS SELECT  ID, Nome FROM Tags ORDER BY Nome ;

CREATE VIEW visu_index AS
SELECT
    postagens.Titulo,
    postagens.desc_imagem,
    postagens.autor,
    postagens.imagem,
    postagens.DataDePublicacao,
    YEAR(postagens.DataDePublicacao) as AnoPublicacao,
    LPAD(MONTH(postagens.DataDePublicacao), 2, '0') as MesPublicacao,
    LPAD(DAY(postagens.DataDePublicacao), 2, '0') as DAYPublicacao,
    categoria.nome AS categoria_nome,
    tags.nome AS tags_nome,
    postagens.Descricao
FROM
    postagens
JOIN
    Tags tags ON postagens.TagsID = tags.ID
JOIN
    Categoria categoria ON postagens.CategoriaID = categoria.ID;


