# Blog de Viagens - README

Este é um projeto de blog de viagens que utiliza PHP, MySQL e HTML para criar uma plataforma simples de compartilhamento de postagens sobre diversos destinos e experiências.

## HTML e CSS 

Este projeto utiliza o HTML e o CSS que foram aprendidos e adaptados a partir de um curso que assisti na Udemy. Você pode encontrar o código fonte original do HTML e CSS utilizado neste projeto [aqui](https://github.com/matheusbattisti/html_css_completo/tree/main/12_BLOG_PROJETO_HTML_SEMANTICO).

## Estrutura do Projeto

O projeto é dividido em diferentes arquivos e diretórios:

- `index.php`: Página principal do blog que exibe as postagens mais recentes.
- `categorias.php`: Página dedicada à criação e visualização de categorias para organizar as postagens.
- `criar_postagens.php`: Página que permite a criação de novas postagens, incluindo título, descrição, autor, categoria e tags associadas.
- `contato.php`: Página de contato para interação com os leitores.
- `conexao.php`: Arquivo PHP responsável pela conexão com o banco de dados MySQL.
- `postagem.css`: Arquivo CSS que define o estilo visual das postagens.
- `script.js`: Script JavaScript que pode ser utilizado para interatividade na interface do usuário.
- `css/`: Diretório que contém arquivos CSS adicionais, como `categorias.css`.
- `img/`: Diretório para armazenar imagens utilizadas nas postagens.

## Banco de Dados

O banco de dados blog contém as seguintes tabelas:

- `Contato`: Armazena informações de contato, como nome, e-mail, telefone e endereço.
- `Categoria`: Representa categorias para classificar as postagens. Cada categoria possui um nome e uma descrição.
- `Tags`: Contém tags associadas às postagens.
- `Postagens`: Armazena as postagens do blog, incluindo título, descrição, autor, imagem, data de publicação, categoria, tags e uma descrição detalhada.

### Visualizações

Foram criadas visualizações para facilitar a consulta de dados específicos:

- `visu_categorias`: Visualização que mostra o ID e o nome das categorias ordenadas por nome.
- `visu_tags`: Visualização que mostra o ID e o nome das tags ordenadas por nome.
- `visu_index`: Visualização que agrega informações das postagens, incluindo título, descrição, autor, imagem, data de publicação, ano, mês, dia, nome da categoria, nome da tag e descrição detalhada.

## Uso

1. Clone o repositório para seu ambiente local.
2. Importe
