<?php

include_once("conexao.php");

$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$dia = $_POST['dia'];
$nome = $_POST['nome'];
$instituicao = $_POST['instituicao'];
$aluno = $_POST['aluno'];

$result_id_matricula = "SELECT Id from matricula ORDER BY id DESC LIMIT 1";
$resultado_id_matricula = mysqli_query($conn, $result_id_matricula);

$maior_matricula = 0;

while($Id_matricula = $resultado_id_matricula->fetch_array()) {

$maior_matricula =  $Id_matricula['Id'];

}

$matricula = $maior_matricula + 1;

$result_matricula = "INSERT INTO matricula(id, valor, Quanti, Dia, Nome, Id_Inst, Id_Alu) VALUES ('$matricula','$valor','$quantidade', '$dia','$nome','$instituicao', '$aluno')";
$resultado_matricula = mysqli_query($conn, $result_matricula);

//echo date('d/m/Y \à\s H:i:s');
$dia_mes = date('d');
$mes_mes = date('m');
$ano_mes = date('Y');


if($dia <= $dia_mes){
    if($mes_mes == 12){
        $mes_mes = 01;
    }else{
    $mes_mes = $mes_mes + 1;
    }
}

$vencimento_fatura = $ano_mes . "/" . $mes_mes . "/" . $dia  ;
$valor_parcela = $valor / $quantidade;
$parcela = 1;
for ($i=1; $i <= $quantidade; $i++){
$result_fatura = "INSERT INTO faturas(Valor, Vencimento, Id_Mat, Status, Parcela) VALUES ('$valor_parcela','$vencimento_fatura', '$matricula','Aberta', '$parcela')";
$resultado_fatura = mysqli_query($conn, $result_fatura);
if($mes_mes == 12){
    $mes_mes = 01;
    $ano_mes = $ano_mes + 1;
}else{
$mes_mes = $mes_mes + 1;
}

$vencimento_fatura = $ano_mes . "/" . $mes_mes . "/" . $dia  ;
$parcela = $parcela + 1;
}

if(mysqli_affected_rows($conn) != 0){
    echo " Matrícula cadastrado com Sucesso.<br>";
    echo " <a href='index.php' class='button'>Voltar</a>";    
}else{
    echo "A Matrícula não foi cadastrado com Sucesso.<br>";  
    echo " <a href='index.php' class='button'>Voltar</a>";      
}

?>