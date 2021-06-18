<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$celular = $_POST['celular'];
$genero = $_POST['genero'];
$pagamento = $_POST['pagamento'];

$result_aluno = "INSERT INTO aluno(Nome, CPF, Nascimento, Celular, Genero, Pagamento) VALUES ('$nome','$cpf', '$data','$celular','$genero', '$pagamento')";
$resultado_aluno = mysqli_query($conn, $result_aluno);

if(mysqli_affected_rows($conn) != 0){
    echo " Aluno cadastrado com Sucesso.<br>";
    echo " <a href='index.php' class='button'>Voltar</a>";    
}else{
    echo "O Aluno não foi cadastrado com Sucesso.<br>";  
    echo " <a href='index.php' class='button'>Voltar</a>";      
}

?>