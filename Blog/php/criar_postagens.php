<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog</title>
    <link rel="stylesheet" href="postagem.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
  </head>
</script>
  <script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
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
        <h1 id="h_form">Postar momentos</h1>
        <h2 id="h2_form">Sonhar aos ventos</h2>
        <article class="post">
         
            <form id="form-postagem" action="enviar_postagem.php" method="post"  >
                <input class="input" name="titulo" type="text" placeholder="Título da postagem" required maxlength="60">
                <input class="input" name="imagem" type="file" placeholder="Imagem da postagem" required>
                <select id="select" name="categoriaID" class="js-example-basic-single" name="state" required>
                    <option value="" disabled selected>Selecione a categoria </option>
                        <?php
                         $conn = new mysqli("localhost", "root", "", "blog");
                         if ($conn->connect_error) {
                             die("Falha na conexão com o banco de dados: " . $conn->connect_error);
                         }
                        $sql = "SELECT ID, Nome FROM visu_categorias";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['ID'] . "'>" . $row['Nome'] . "</option>";
                            }
                        }
                        $conn->close();
                        ?>
                </select>
                <select id="select" name="tagsID" class="js-example-basic-single" name="state" required>
                    <option value="" disabled selected>Selecione a tag </option>
                        <?php
                         $conn = new mysqli("localhost", "root", "", "blog");
                         if ($conn->connect_error) {
                             die("Falha na conexão com o banco de dados: " . $conn->connect_error);
                         }
                        $sql = "SELECT ID, Nome FROM visu_tags";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['ID'] . "'>" . $row['Nome'] . "</option>";
                            }
                        }
                        $conn->close();
                        ?>
                </select>
                
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                <input class="input" name="desc_imagem" type="text" placeholder="Descrição da imagem" required>
                <input class="input" name="autor" type="text" placeholder="Autor da postagem" required>
                <textarea class="input" name="descricao" id="descricao" cols="30" rows="8" placeholder="Descrição da postagem" required> </textarea>
                <div class="button-container">
                  <button class="button">Postar</button>
                </div>
                
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
        <section id="categories">
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
               
                   if ($cont <= 14) {
                       echo '<li> <a>' . $row['nome'] . '</a> </li>';
                   } else {
                       if ($cont == 16) {
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