<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="recursos\css\estilo.css">
    
</head>
<body>

    <?php
    include_once("conexao.php");
    $query = " SELECT * FROM instituicao";
    $select_inst = mysqli_query($conn, $query);
    ?>

    <?php
    include_once("conexao.php");
    $query_aluno = " SELECT * FROM aluno";
    $select_aluno = mysqli_query($conn, $query_aluno);
    ?>

    <link href="../sites/all/libraries/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../sites/all/libraries/bootstrap/css/bootstrap-theme.min.css" data-href="../sites/all/libraries/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet">
        
	<script src="../sites/all/libraries/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <style>
    table th {
            background: #B0C4DE;
			}
    table td {
            background: #A9A9A9;
			}
    .conteudo {
            overflow-x: hidden;
            overflow-y: hidden;
            }
    </style>

    <form action="cad_matricula.php" method="POST">
    <header class="cabecalho">
        <h1>Projeto Billinho</h1>
    </header>
    <main class="principal">
        <nav class="modulos">
            <div class="conteudo">
                Valor Total do Curso: <input type="number" name="valor" id="valor" step=".01" required> <br><br>
                Quantida de faturas: <input type="number" name="quantidade" id="quantidade" required> <br><br>
                Dia de Vencimento: <input type="number" name="dia" id="dia" required> <br><br>
                Nome do Curso: <input type="text" name="nome" id="nome" required> <br><br>
                Instituição: 
                <select id="instituicao" name="instituicao"  required>
                    <option>Selecione...</option>
                    <?php while($inst = mysqli_fetch_array($select_inst)) { ?>
                    <option value="<?php echo $inst['Id']; ?>"><?php echo $inst['Nome']; ?></option>
                    <?php } ?>
                </select><br><br>
                Aluno: 
                <select id="aluno" name="aluno"  required>
                    <option>Selecione...</option>
                    <?php while($aluno = mysqli_fetch_array($select_aluno)) { ?>
                    <option value="<?php echo $aluno['Id']; ?>"><?php echo $aluno['Nome']; ?></option>
                    <?php } ?>
                </select><br><br>

                <input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar">
            </div>
        </nav>
        
        <br>
        
        <?php
        $result_matricula= "SELECT * from matricula ORDER BY id ";
        $resultado_matricula = mysqli_query($conn, $result_matricula);
        ?>

        <nav class="modulos">
            <div class="conteudo" overflow="hidden" >
            <table>
                <tr>
                    <th>Valor do Curso</th>
                    <th>Quantidade de Parcelas</th>
                    <th>Dia de Vencimento</th>
                    <th>Nome do Curso</th>
                    <th>Instituição</th>
                    <th>Aluno</th>
                </tr>

                <?php while($Matricula = $resultado_matricula->fetch_array()) {
                ?>

                <tr>
                    <td> <?php echo $Matricula['Valor']; ?></td>
                    <td> <?php echo $Matricula['Quanti']; ?></td>
                    <td> <?php echo $Matricula['Dia']; ?></td>
                    <td> <?php echo $Matricula['Nome']; ?></td>
                    
                    <?php
                    $id_inst = $Matricula['Id_Inst'];
                    $result_inst= "SELECT Id, Nome from instituicao Where Id = $id_inst";
                    $resultado_inst = mysqli_query($conn, $result_inst);
                    $row = mysqli_fetch_row($resultado_inst);
                    $nome_inst = $row[1];
                    ?>

                    <td> <?php echo $nome_inst; ?> </td>

                    <?php
                    $id_aluno = $Matricula['Id_Alu'];
                    $result_aluno= "SELECT Id, Nome from aluno Where Id = $id_aluno";
                    $resultado_aluno = mysqli_query($conn, $result_aluno);
                    $row_aluno = mysqli_fetch_row($resultado_aluno);
                    $nome_aluno = $row_aluno[1];
                    ?>

                    <td> <?php echo $nome_aluno; ?></td>
                </tr>

                <?php
                
                }?>

            </table>
            <?php echo " <a href='index.php' class='button'>Voltar</a>"; ?>
            </div>
        </nav>

    </main>
    <footer class="rodape">
        ARDITO <?= date('Y'); ?>
    </footer>
</form>
</body>
</html>