<?php

include("conexao.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $titulo = $_POST["titulo"];
    $categoriaID = $_POST["categoriaID"];
    $tagsID = $_POST["tagsID"];
    $desc_imagem = $_POST["desc_imagem"];
    $autor = $_POST["autor"];
    $descricao = $_POST["descricao"];

    if (empty($_POST['imagem'])) {
        $imagem = "images.jfif"; 
    } else {
        $imagem = $_POST["imagem"];
    }
  

    $sql_insert = "INSERT INTO Postagens (titulo, imagem, CategoriaID, TagsID, desc_imagem, autor, descricao) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql_insert);
    $stmt->bind_param("ssiisss", $titulo, $imagem, $categoriaID, $tagsID, $desc_imagem, $autor, $descricao);

    if ($stmt->execute()) {
        echo  "<script>
          alert('Postagem inserida com sucesso!.');
          window.location.href = 'criar_postagens.php'; // Redireciona para a página de cadastro
          </script>";
    } else {
        echo  "<script>
          alert('Postagem não foi inserida !.');
          window.location.href = 'criar_postagens.php'; // Redireciona para a página de cadastro
          </script>";
    }

    $stmt->close();
   

    
}
?>
