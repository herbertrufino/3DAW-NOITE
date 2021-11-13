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
    $nomePara = $_POST["nomePara"];
    $matriculaPara = $_POST["matriculaPara"];
    $funcaoPara = $_POST["funcaoPara"];
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

<h1>Alterar Usuário</h1>

<?php

if ($ehPost) {

    if (isset($linha)) {
        $arquivo = fopen($nomeArquivo, "w");
        $cabecalho = "nome;matricula;funcao\n";
        fwrite($arquivo,$cabecalho);
        foreach($linha as $usuario) {
            list($nomeLinha, $matriculaLinha, $funcaoLinha) = explode(";", $usuario);
            if ($nome == $nomeLinha){
                $nomeLinha = $nomePara;
            }
            if ($matricula == $matriculaLinha) {
                $matriculaLinha = $matriculaPara;
            }
            if ($funcao == $funcaoLinha) {
                $funcaoLinha = $funcaoPara;
            }

            $usuario = "$nomeLinha;$matriculaLinha;$funcaoLinha";
            var_dump($usuario);
            fwrite($arquivo,$usuario);
        }
        fclose($arquivo);
    }
    echo "<h3>Usuário $nome alterado com sucesso</h3>";

}

?>

<form action="altera_usuario.php" method="POST">
    nome:   <input type="text" name="nome"> para:<input type="text" name="nomePara"><br>
    matricula: <input type="text" name="matricula">para:<input type="text" name="matriculaPara"><br>
    função:   <input type="text" name="funcao">para:<input type="text" name="funcaoPara"><br>
    <input type="submit" value="alterar">
</form>
</body>
</html>