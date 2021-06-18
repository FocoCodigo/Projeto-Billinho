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

    <script>
    function verificarCPF(c){
    var i;
    s = c;
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;
 
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }
    if (d1 == 0){
        alert("CPF Inválido")
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        alert("CPF Inválido")
        v = true;
        return false;
    }
 
    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
        alert("CPF Inválido")
        v = true;
        return false;
    }
    if (!v) {
        //alert(c + "nCPF Válido")
    }
    }
    </script>

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

    <form action="cad_aluno.php" method="POST">
    <header class="cabecalho">
        <h1>Projeto Billinho</h1>
    </header>
    <main class="principal">
        <nav class="modulos">
            <div class="conteudo">
                Nome: <input type="text" name="nome" id="nome" required> <br><br>
                CPF: <input type="number" name="cpf" id="cpf" maxlength="11" onblur="return verificarCPF(this.value)" required> <br><br>
                Data de Nascimento: <input type="date" name="data" id="data" required> <br><br>
                Celular: <input type="number" name="celular" id="celular" required> <br><br>
                Gênero: 
                <select id="genero" name="genero"  required>
                    <option value="">Selecione o gênero</option>
                    <option value="M" >Masculino</option>
                    <option value="F" >Feminino</option>=
                </select><br><br>
                Meio de Pagamento das Faturas: 
                <select id="pagamento" name="pagamento"  required>
                    <option value="">Selecione o meio de pagamento</option>
                    <option value="Boleto" >Boleto</option>
                    <option value="Cartao" >Cartão</option>=
                </select><br><br>

                <input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar">
            </div>
        </nav>

        <br>
        
        <?php
        $result_aluno= "SELECT * from aluno ORDER BY id ";
        $resultado_aluno = mysqli_query($conn, $result_aluno);
        ?>

        <nav class="modulos">
            <div class="conteudo" overflow="hidden" >
            <table>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Celular</th>
                    <th>Gênero</th>
                    <th>Forma de Pagamento</th>
                </tr>

                <?php while($Aluno = $resultado_aluno->fetch_array()) {
                ?>

                <tr>
                    <td> <?php echo $Aluno['Nome']; ?></td>
                    <td> <?php echo $Aluno['CPF']; ?></td>
                    <td> <?php echo $Aluno['Nascimento']; ?></td>
                    <td> <?php echo $Aluno['Celular']; ?></td>
                    <td> <?php echo $Aluno['Genero']; ?></td>
                    <td> <?php echo $Aluno['Pagamento']; ?></td>
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