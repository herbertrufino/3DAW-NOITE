<?php
$nome = $_GET["aluno"];
$email = $_GET["email"];
$idade = $_GET["idade"];
$endereco = $_GET["endereco"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1><?php echo "Dados informados";?></h1>
    <?php
        echo "<p>Nome: $nome </p>
              <p>Email: $email </p>
              <p>Idade: $idade </p>
              <p>Endereço: $endereco </p>";
    ?>
</body>
</html>
