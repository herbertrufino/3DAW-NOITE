<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
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


<h1>Listar Usuários</h1>

<table>
    <tr>
        <th>Nome</th>
        <th>Matricula</th>
        <th>Função</th>
    </tr>
<?php
    if (isset($linha)) {
        foreach ($linha as $usuario) {
            if($usuario) {
                list($nome, $matricula, $funcao) = explode(";", $usuario);
                echo "<tr>";
                echo "<td>$nome</td>";
                echo "<td>$matricula</td>";
                echo "<td>$funcao</td>";
                echo "</tr>";
            }
        }
    }
    ?>
</table>
</body>
</html>