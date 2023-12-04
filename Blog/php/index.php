<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog</title>
    <link rel="stylesheet" href="postagem.css" />
    <script src="script.js"></script>
</head>

<body>
    <nav id="navbar">
        <div id="navbar-inner">
            <h2><a href="../php/index.php">Blog</a></h2>
            <ul id="nav-links">
                <li><a href="../php/index.php">Home</a></li>
                <li><a href="categorias.php">Categorias & Tags</a></li>
                <li><a href="criar_postagens.php">Postagens</a></li>
                <li><a href="contato.php">Contato</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php
        echo '<main id="posts-container">';
        include("conexao.php");
        $sql_select = "SELECT * FROM `visu_index`";
        $result = mysqli_query($conexao, $sql_select);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<article class="post">';
            echo '<img src="../img/' . $row['imagem'] . '" />';
            echo '<div class="title">';
            echo '<h3>' . $row['Titulo'] . '</h3>';
            echo '<h6>' . $row['DAYPublicacao'] . '/' . $row['MesPublicacao'] . '/' . $row['AnoPublicacao'] . '</h6>';
            echo '</div>';

            echo '<p >';
            echo $row['desc_imagem'];
            echo '</p>';
            echo '<h3> Categorias </h3>';
            echo '<p class="tags_cat">';
            echo $row['categoria_nome'];
            echo '</p>';
            echo '<h3> Tag </h3>';
            echo '<p class="tags_cat">';
            echo $row['tags_nome'];
            echo '</p>';
            echo '<h3> Autor </h3>';
            echo '<p class="author">Por: ' . $row['autor'] . '</p>';
            echo '<h3> Descrição </h3>';
            echo '<p>';
            echo $row['Descricao'];
            echo '</p>';
            echo '<div id="descricao_' . $row['Descricao'] . '" style="display: none;">';
          
            echo '</div>';
            echo '</article>';
        }

        echo '</main>';
        ?>

        <aside id="sidebar">
        <section id="search-bar">
                <h4>Busca</h4>
                
                <form>
                    <input type="text" placeholder="Pesquise no blog" />
                    <input type="submit" value="Buscar" />
                </form>
            </section>
            <section id="categories">
                <h4>Categorias</h4>
                <nav>
                    <ul>
                        <?php
                        $sql_select = "SELECT ID, nome FROM Categoria ORDER BY nome";
                        $result = mysqli_query($conexao, $sql_select);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li>' . $row['nome'] . '</li>';
                        }
                        ?>
                    </ul>
                </nav>
            </section>
            <section id="tags">
                <h4>Tags</h4>
                <div id="tags-container">
                    <?php
                    $sql_select = "SELECT ID, nome FROM Tags ORDER BY nome";
                    $result = mysqli_query($conexao, $sql_select);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<a class="tag-link">' . $row['nome'] . '</a>';
                    }
                    ?>
                </div>
            </section>
        </aside>
    </div>
    <footer id="footer">
        <h2>Blog</h2>
        <p>Registrando momentos </p>
        <p>2023 © Bruno Froza</p>
    </footer>

    
</body>

</html>
