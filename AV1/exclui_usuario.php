<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$ehPost = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $funcao = $_POST["funcao"];

} else {
    $ehPost = false;
}

$nomeArquivo = "usuario.txt";
$arquivo = fopen($nomeArquivo, "r") or die("Erro leitura arquivo");
$cabecalho = fgets($arquivo);
while (!feof($arquivo)) {
    $linha[] = fgets($arquivo);
}
fclose($arquivo);
?>

<a href="insere_usuario.php">Inserir Usuário</a><br>
<a href="lista_usuarios.php">Listar Usuários</a><br>
<a href="busca_usuario.php">Buscar Usuário</a><br>
<a href="altera_usuario.php">Alterar Usuário</a><br>
<a href="exclui_usuario.php">Excluir Usuário</a><br>

<h1>Excluir Usuário</h1>

<?php

if ($ehPost) {

    if (isset($linha)) {
        $arquivo = fopen($nomeArquivo, "w");
        $cabecalho = "nome;matricula;funcao\n";
        fwrite($arquivo,$cabecalho);
        foreach($linha as $usuario) {
            list($nomeLinha, $matriculaLinha, $funcaoLinha) = explode(";", $usuario);
            if (($nome == $nomeLinha) || ($matricula == $matriculaLinha) || ($funcao == $funcaoLinha)) {
                echo "<h3>Usuário $nome excluído com sucesso</h3>";
            } else {
                fwrite($arquivo,$usuario);
            }

        }
        fclose($arquivo);
    }

}
?>

<form action="exclui_usuario.php" method="POST">
    nome:   <input type="text" name="nome"><br>
    matricula: <input type="text" name="matricula"><br>
    função:   <input type="text" name="funcao"><br>
    <input type="submit" value="excluir">
</form>
    
</html>
