<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="recursos\css\estilo.css">
   
</head>
<body>
    <header class="cabecalho">
        <h1>Projeto Billinho</h1>
    </header>
    <main class="principal">
        <div class="conteudo">
            <nav class="modulos">
                <div class="modulo verde">
                    <!--<h3>Básico</h3>-->
                    <ul>
                        <li><a href="form_instituicao.php">
                            Instituição de Ensino
                            </a>
                        </li>
                        <li><a href="form_aluno.php">
                            Aluno
                            </a>
                        </li>
                        <li><a href="form_matricula.php">
                            Mátricula
                            </a>
                        </li>
                        <li><a href="form_fatura.php">
                            Faturas
                            </a>
                        </li>
                    </ul>
                </div>
            
            </nav>
            
        </div>
    </main>
    <footer class="rodape">
        ARDITO <?= date('Y'); ?>
    </footer>
</body>
</html>