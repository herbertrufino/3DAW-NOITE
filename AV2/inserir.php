<?php

$msgErro = "";

if (isset($_GET["chassis"])){
    $strChassis = $_GET["chassis"];
} else {
    $msgErro = $msgErro . 'Chassis não pode ser vazio. <br>';
}
if (isset($_GET["marca"])){
    $strMarca = $_GET["marca"];
} else {
    $msgErro = $msgErro . "Marca não pode ser vazio. <br>";
}
if (isset($_GET["modelo"])){
    $strModelo = $_GET["modelo"];
} else {
    $msgErro = $msgErro . "Modelo não pode ser vazio. <br>";
}
if (isset($_GET["placa"])){
    $strPlaca = $_GET["placa"];
} else {
    $msgErro = $msgErro . "Placa não pode ser vazio. <br>";
}
if (isset($_GET["qtdAssentos"])){
    $strQtdAssentos = $_GET["qtdAssentos"];
    if ((int)$strQtdAssentos != 23 && (int)$strQtdAssentos != 28 && (int)$strQtdAssentos != 32) {
        $msgErro = $msgErro . "Quantidade de assentos inválida <br>";
    }
} else {
    $msgErro = $msgErro . "Selecione a quantidade de assentos. <br>";
}
if (isset($_GET["temArCondicionado"])){
    $strTemArCondicionado = strtolower($_GET["temArCondicionado"]);
    if (strcmp($strTemArCondicionado,"sim") != 0 && strcmp($strTemArCondicionado,"nao") != 0) {
        $msgErro = $msgErro . "Selecione a opção correta. <br>";
    }
} else {
    $msgErro = $msgErro . "Selecione se tem Ar-condicionado. <br>";
}
if (isset($_GET["temBanheiro"])){
    $strTemBanheiro = strtolower($_GET["temBanheiro"]);
    if (strcmp($strTemBanheiro,"sim") != 0 && strcmp($strTemBanheiro,"nao") != 0) {
        $msgErro = $msgErro . "Selecione a opção correta. <br>";
    }
} else {
    $msgErro = $msgErro . "Selecione se tem Ar-condicionado. <br>";
}

if ($msgErro == "") {

    $temArCondicionado = 1;
    $temBanheiro = 1;


    if ($strTemArCondicionado == "sim") {
        $temArCondicionado = 0;
    }

    if ($strTemBanheiro == "sim") {
        $temBanheiro = 0;
    }


    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodeDados = "faeterj3dawnoite";
    $conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($conn->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }

    $sql = "INSERT INTO `onibus` (`chassis`,`marca`,`modelo`,`placa`,`qtdAssentos`,`temArCondicionado`,`temBanheiro`) VALUES ('$strChassis','$strMarca','$strModelo','$strPlaca',$strQtdAssentos,$temArCondicionado,$temBanheiro)";
    $result = $conn->query($sql);

    echo "registro inserido com sucesso";

} else {
    echo $msgErro;
}
?>