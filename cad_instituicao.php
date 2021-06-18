<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$tipo = $_POST['tipo'];

$result_instituicao = "INSERT INTO instituicao(nome, cnpj, tipo) VALUES ('$nome','$cnpj', '$tipo')";
$resultado_instituicao = mysqli_query($conn, $result_instituicao);

if(mysqli_affected_rows($conn) != 0){
    echo " Instituição cadastrado com Sucesso.<br>";
    echo " <a href='index.php' class='button'>Voltar</a>";    
}else{
    echo "A instituição não foi cadastrado com Sucesso.<br>";  
    echo " <a href='index.php' class='button'>Voltar</a>";      
}

?>