<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$noticias = [
    ["titulo" => "Notícia 1", "conteudo" => "Detalhes da Notícia 1"],
    ["titulo" => "Notícia 2", "conteudo" => "Detalhes da Notícia 2"],
    ["titulo" => "Notícia 3", "conteudo" => "Detalhes da Notícia 3"]
];

foreach ($noticias as $noticia) {
    $stmt = $conn->prepare("INSERT INTO noticias (titulo, conteudo) VALUES (?, ?)"); // conexão com o banco que inserta as noticias
    $stmt->bind_param("ss", $noticia['titulo'], $noticia['conteudo']); // vincula o titulo e conteudo, ambos string
    $stmt->execute(); // executa
}

echo "Notícias inseridas com sucesso!"; // se der certo retorna o echo

$stmt->close(); // fecha a conexão com o banco
$conn->close(); // fecha o banco
?>