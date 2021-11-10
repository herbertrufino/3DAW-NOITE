<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
</body>

<a href="insere_usuario.php">Inserir Usuário</a><br>
<a href="lista_usuarios.php">Listar Usuários</a><br>
<a href="busca_usuario.php">Buscar Usuário</a><br>
<a href="altera_usuario.php">Alterar Usuário</a><br>
<a href="exclui_usuario.php">Excluir Usuário</a><br>

<h1>Excluir Aluno</h1>

<h3><?php if ($ehPost) {echo "Aluno $nome inserido com sucesso";} ?></h3>

<form action="insere_usuario.php" method="POST">
    nome:   <input type="text" name="nome"><br>
    matricula: <input type="text" name="matricula"><br>
    função:   <input type="text" name="funcao"><br>
    <input type="submit" value="enviar">
</form>
    
</html>
