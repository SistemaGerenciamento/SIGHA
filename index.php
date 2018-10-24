<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css_3.3.7/bootstrap.min.css">
        <link rel="stylesheet" href="js_4.1/bootstrap.min.js">
        
        <?php
        include 'autenticacao.php';
        autenticar();
        sessaoExpirada();
        include './conexao.php';
        ?>
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">    
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand">Bem-Vinda</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="Professores(PRONTO)/form_professores.php">Cadastrar Professores</a></li>
                            <li><a href="Curso(PRONTO)/form_curso.php">Cadastro de Curso</a></li>
                            <li><a href="Disciplina(PRONTO)/form_disciplina.php">Cadastrar Disciplina</a></li>
                            <li><a href="FeriadosMotivo/form_feriado_motivo.php">Cadastro de Feriados/Motivos</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="deslogar.php"><span class="glyphicon glyphicon-user"></span>Sair</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </body>
</html>
