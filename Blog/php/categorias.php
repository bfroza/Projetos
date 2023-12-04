
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Categorias & Tags</title>
    <link rel="stylesheet" href="../css/categorias.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>
    </script>
    <nav id="navbar">
      <div id="navbar-inner">
        <h2 ><a href="../php/index.php">Blog</a></h2>
        <ul id="nav-links">
          <li><a href="../php/index.php">Home</a></li>
          <li><a href="categorias.php">Categorias & Tags</a></li>
          <li><a href="criar_postagens.php">Postagens</a></li>
          <li><a href="contato.php">Contato</a></li>
          <li><a href="#"></a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <main id="posts-container">
      
        <div id="form"> 
        <a href="categorias.php"  ><img src="../img/category.png" alt="" width="50px" height="50px"></a>
        <h1 id="h_form">Criar categorias</h1>
        <h2 id="h2_form">Imaginar alegrias</h2>
        <article class="post">
         
            <form id="form-postagem" action="categoria.php" method="post"  >
                <input class="input" name="nome" type="text" placeholder="Nome da categoria" required>
                <textarea class="input" name="descricao" id="descricao" cols="30" rows="8" placeholder="Descrição da categoria" required> </textarea>
                <button class="button">Criar Categoria</button>
            </form>
          </div>
        </article>
    
      </main>
      
      <aside id="sidebar">
        <section id="search-bar">
          <h4>Busca</h4>
          <form>
            <input type="text" placeholder="Pesquise no blog" />
            <input type="submit" value="Buscar" />
          </form>
        </section>
        <section id="categories" class="sidebar-section">
          <h4>Categorias</h4>
          <nav>
            <ul>
              <?php
               include("conexao.php");
               $sql_select = "SELECT ID, nome FROM Categoria";
               $result = mysqli_query($conexao, $sql_select);
               $cont = 0;
               
               while ($row = mysqli_fetch_assoc($result)) {
                   $cont++;
               
                   if ($cont <= 10) {
                       echo '<li> <a>' . $row['nome'] . '</a> </li>';
                   } else {
                       if ($cont == 13) {
                           echo '<li> <a>' . $row['nome'] . '</a> </li>';
                           echo '<li> <a href="#">Ler mais</a> </li>';
                       } else {
                           
                           echo '<li style="display: none;"> <a>' . $row['nome'] . '</a> </li>';
                       }
                   }
               }
                ?>
            </ul>
          </nav>
        </section>
      </aside>
    </div>
    <div class="container">
    <main id="posts-container">
    <div id="form_a"> 
        <a href="categorias.php"><img src="../img/price-tag.png" alt="" width="50px" height="50px"></a>
        <h1 id="h_form">Criar tags</h1>
        <h2 id="h2_form">Associar hastags</h2>
        <article class="post">
            <form id="form-postagem" action="tags.php" method="post">
                <input class="input" name="nome" type="text" placeholder="Nome da tag" required>
                <button class="button">Criar Tag</button>
            </form>
        </article>
    </div>
    </main>

      
      <aside id="sidebar">
        <section id="search-bar">
          <h4>Busca</h4>
          <form>
            <input type="text" placeholder="Pesquise no blog" />
            <input type="submit" value="Buscar" />
          </form>
        </section>
        <section id="tags">
          <h4>Tags</h4>
          <div id="tags-container">
            <?php
                include("conexao.php");
                $sql_select = "SELECT ID, nome  FROM Tags Order By nome";
                $result = mysqli_query($conexao, $sql_select);
                while ($row = mysqli_fetch_assoc($result))
                    if($result){
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

