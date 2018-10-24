<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css_3.3.7/bootstrap.min.css">
        <link rel="stylesheet" href="../js_4.1/bootstrap.min.js">
        <title></title>
    </head>
    <body>

        <?php
        include '../conexao.php';
        include '../autenticacao.php';
        autenticar();
        sessaoExpirada();
        include '../menu.php';
        ?>

        <?php
        include '../conexao.php';
        $id = $_GET['id'];

        $sql = "select * from feriados where id = $id";

        $retorno = mysqli_query($conexao, $sql);

        $linha = mysqli_fetch_array($retorno);
        ?>

        <br>
        <br>


        <div class="container">
            <h2>Alterar Cadastro de Feriados/Motivos</h2>
            <form method="post" class="form-horizontal" action="alterar.php">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="motivo">Motivo:</label>
                    <div class="col-sm-4">
                        <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                        <input type="nome" class="form-control" id="motivo" placeholder="Digite o motivo" name="motivo" required value="<?= $linha['motivo'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="data">Data:</label>
                    <div class="col-sm-4">          
                        <input type="date" class="form-control" id="data" placeholder="Insira a data" name="data" required value="<?= $linha['feriado'] ?>">
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-default">Alterar</button>
                    </div>
                </div>
            </form>
        </div>


    </body>
</html>
