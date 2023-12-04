<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
  
    

    $sql_insert = "INSERT INTO tags (nome) 
    VALUES (?)";

    $stmt = $conexao->prepare($sql_insert);
    $stmt->bind_param("s", $nome);
    if ($stmt->execute()) {
        echo "<script>
            alert('Tag inserida com sucesso!.');
            window.location.href = 'categorias.php'; // Redireciona para a página de cadastro
            </script>";
    } else {
        echo "<script>
            alert('Erro ao inserir Tag: " . $conexao->error . "');
            </script>";
    }
    

    $stmt->close();
}
?>