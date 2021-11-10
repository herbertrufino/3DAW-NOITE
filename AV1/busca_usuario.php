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
$arquivoAluno = fopen($nomeArquivo, "r") or die("Erro leitura arquivo");
$cabecalho = fgets($arquivoAluno);
while (!feof($arquivoAluno)) {
    $linha[] = fgets($arquivoAluno);
}
fclose($arquivoAluno);
?>

<a href="insere_usuario.php">Inserir Usuário</a><br>
<a href="lista_usuarios.php">Listar Usuários</a><br>
<a href="busca_usuario.php">Buscar Usuário</a><br>
<a href="altera_usuario.php">Alterar Usuário</a><br>
<a href="exclui_usuario.php">Excluir Usuário</a><br>


<a href="ex4_altAluno.php">Alterar Aluno</a><br>
<a href="ex4_excluirAluno.php">Excluir Aluno</a><br><br>

<h1>Buscar Usuário</h1>

<form action="busca_usuario.php" method="POST">
    nome:   <input type="text" name="nome"><br>
    matricula: <input type="text" name="matricula"><br>
    função:   <input type="text" name="funcao"><br>
    <input type="submit" value="buscar">
</form>

<?php
    if ($ehPost) {
        echo "<table><tr><th>Nome</th><th>Matricula</th><th>Função</th></tr>";
        foreach($linha as $usuario) {
            list($nomeLinha,$matriculaLinha,$funcaoLinha) = explode(";",$usuario);
            if (($nome == $nomeLinha) || ($matricula == $matriculaLinha) || ($funcao == $funcaoLinha)){
                
                echo "<tr>";
                echo "<td>$nomeLinha</td>";
                echo "<td>$matriculaLinha</td>";
                echo "<td>$funcaoLinha</td>";
                echo "</tr>";
            }
        }
    }
?>