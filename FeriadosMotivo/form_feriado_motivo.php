<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css_3.3.7/bootstrap.min.css">
        <link rel="stylesheet" href="../js_4.1/bootstrap.min.js">
    </head>
    <body>
        <?php
        include '../conexao.php';
        include '../autenticacao.php';
        autenticar();
        sessaoExpirada();
        include '../menu.php';
        ?>

        <br>
        <br>




        <div class="container">
            <div class="header clearfix">
                <div class="container-fluid">
                    <h2>Cadastro de Feriados/Motivos</h2>
                    <form method="post" class="form-horizontal" action="inserir.php">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="motivo">Motivo:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="motivo" placeholder="Digite o motivo" name="motivo" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="data">Data:</label>
                            <div class="col-sm-4">          
                                <input type="date" class="form-control" id="data" placeholder="Insira a data" name="data" required>
                            </div>
                        </div>
                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-default">Cadastrar</button>
                            </div>
                        </div>
                    </form>

                    <br>
                    <br>

                    <?php
                    include './listar.php';
                    ?>
                </div>
            </div>
        </div>







    </body>
</html>
