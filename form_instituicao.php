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


        function validarCNPJ(cnpj) {
 
 cnpj = cnpj.replace(/[^\d]+/g,'');

 if(cnpj == '') return false;
  
 if (cnpj.length != 14)
     return false;

 // Elimina CNPJs invalidos conhecidos
 if (cnpj == "00000000000000" || 
     cnpj == "11111111111111" || 
     cnpj == "22222222222222" || 
     cnpj == "33333333333333" || 
     cnpj == "44444444444444" || 
     cnpj == "55555555555555" || 
     cnpj == "66666666666666" || 
     cnpj == "77777777777777" || 
     cnpj == "88888888888888" || 
     cnpj == "99999999999999")
     return false;
      
 // Valida DVs
 tamanho = cnpj.length - 2
 numeros = cnpj.substring(0,tamanho);
 digitos = cnpj.substring(tamanho);
 soma = 0;
 pos = tamanho - 7;
 for (i = tamanho; i >= 1; i--) {
   soma += numeros.charAt(tamanho - i) * pos--;
   if (pos < 2)
         pos = 9;
 }
 resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
 if (resultado != digitos.charAt(0))
     return false;
      
 tamanho = tamanho + 1;
 numeros = cnpj.substring(0,tamanho);
 soma = 0;
 pos = tamanho - 7;
 for (i = tamanho; i >= 1; i--) {
   soma += numeros.charAt(tamanho - i) * pos--;
   if (pos < 2)
         pos = 9;
 }
 resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
 if (resultado != digitos.charAt(1))
       return false;
        
 return true;
 
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
    

    <form action="cad_instituicao.php" method="POST">
    <header class="cabecalho">
        <h1>Projeto Billinho</h1>
    </header>
    <main class="principal">
        <nav class="modulos">
            <div class="conteudo">
                Nome: <input type="text" name="nome" id="nome" required> <br><br>
                CNPJ: <input type="number" name="cnpj" id="cnpj" onblur="if(!validarCNPJ(this.value)){alert('CNPJ Informado é inválido'); this.value='';}" required> <br><br>
                Tipo: 
                <select id="tipo" name="tipo"  required>
                  
                    <option value="">Selecione o tipo</option>
                    <option value="Universidade" >Universidade</option>
                    <option value="Escola" >Escola</option>
                    <option value="Creche" >Creche</option>
                </select><br><br>

                <input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar">
            </div>
        </nav>

        <br>
        
        <?php
        $result_instituicao= "SELECT * from instituicao ORDER BY id ";
        $resultado_instituicao = mysqli_query($conn, $result_instituicao);
        ?>

        <nav class="modulos">
            <div class="conteudo" overflow="hidden" >
            <table>
                <tr>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Tipo</th>
                </tr>

                <?php while($Instituicao = $resultado_instituicao->fetch_array()) {
                ?>

                <tr>
                    <td> <?php echo $Instituicao['Nome']; ?></td>
                    <td> <?php echo $Instituicao['CNPJ']; ?></td>
                    <td> <?php echo $Instituicao['Tipo']; ?></td>
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
