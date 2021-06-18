<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="recursos\css\estilo.css">
    
</head>
<body>

    <?php include_once("conexao.php"); ?>

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
        
        
        <?php
        $result_fatura= "SELECT * from faturas ORDER BY id ";
        $resultado_fatura = mysqli_query($conn, $result_fatura);
        ?>

        <nav class="modulos">
            <div class="conteudo" overflow="hidden" >
            <table>
                <tr>
                    <th>Valor da Fatura</th>
                    <th>Vencimento da Fatura</th>
                    <th>Matrícula</th>
                    <th>Status da Fatura</th>
                    <th>Número da Parcela</th>
                </tr>

                <?php $proxima_fatura = 0; ?>
                <?php while($Fatura = $resultado_fatura->fetch_array()) {
                ?>

                

                    <?php 
                        if($proxima_fatura == 0){
                            ?><tr>
                            <td> <?php echo $Fatura['Valor']; ?></td>
                            <td> <?php echo $Fatura['Vencimento']; ?></td>
                            <td> <?php echo $Fatura['Id_Mat']; ?></td>
                            <td> <?php echo $Fatura['Status']; ?></td>
                            <td> <?php echo $Fatura['Parcela']; ?></td>
                            <?php $proxima_fatura = $Fatura['Id_Mat']; 
                            echo "</tr>";
                        }else if($proxima_fatura == $Fatura['Id_Mat']){
                            ?><tr>
                            <td> <?php echo $Fatura['Valor']; ?></td>
                            <td> <?php echo $Fatura['Vencimento']; ?></td>
                            <td> <?php echo $Fatura['Id_Mat']; ?></td>
                            <td> <?php echo $Fatura['Status']; ?></td>
                            <td> <?php echo $Fatura['Parcela']; ?></td>
                            <?php 
                            $proxima_fatura = $Fatura['Id_Mat']; 
                            echo "</tr>";
                        }else{
                            echo "</tr>";
                            echo "<tr>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "</tr>";
                            ?><tr>
                            <td> <?php echo $Fatura['Valor']; ?></td>
                            <td> <?php echo $Fatura['Vencimento']; ?></td>
                            <td> <?php echo $Fatura['Id_Mat']; ?></td>
                            <td> <?php echo $Fatura['Status']; ?></td>
                            <td> <?php echo $Fatura['Parcela']; ?></td>
                            <?php 
                            $proxima_fatura = $Fatura['Id_Mat']; 
                            
                        }
                    ?>
                    
                  
                

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