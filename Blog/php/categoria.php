<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    

    $sql_insert = "INSERT INTO Categoria (nome, descricao) 
    VALUES (?, ?)";

    $stmt = $conexao->prepare($sql_insert);
    $stmt->bind_param("ss", $nome, $descricao);
    if ($stmt->execute()) {
        echo "<script>
            alert('Categoria inserida com sucesso!.');
            window.location.href = 'index.php'; // Redireciona para a página de cadastro
            </script>";
    } else {
        echo "<script>
            alert('Erro ao inserir categoria: " . $conexao->error . "');
            </script>";
    }
    

    $stmt->close();
}
?>