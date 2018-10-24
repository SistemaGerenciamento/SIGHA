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

        $sql = "select * from professores where id = $id";

        $retorno = mysqli_query($conexao, $sql);

        $linha = mysqli_fetch_array($retorno);

        $dias = array();

        $sql_dias_semana = "SELECT * from professor_semana where professor_id = $id";

        $retorno_dias_semana = mysqli_query($conexao, $sql_dias_semana);

        while ($linha2 = mysqli_fetch_array($retorno_dias_semana)) {
            array_push($dias, $linha2['semana_id']);
        }
        ?>

        <br>
        <br>


        <div class="container">
            <h2>Alterar Cadastro de Professores</h2>
            <form method="post" class="form-horizontal" action="alterar.php">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Nome:</label>
                    <div class="col-sm-4">
                        <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                        <input type="nome" class="form-control" id="nome" placeholder="Digite o nome" name="nome" required value="<?= $linha['nome'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="carga_horaria">Carga horária:</label>
                    <div class="col-sm-4">          
                        <input type="number" class="form-control" id="carga_horaria" placeholder="Digite a carga horária" name="carga_horaria" required value="<?= $linha['carga_horaria'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">E-mail:</label>
                    <div class="col-sm-4">          
                        <input type="email" class="form-control" id="email" placeholder="Digite o e-mail" name="email" required value="<?= $linha['email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="dias_da_semana">Dias da Semana:</label>
                    <div class="col-sm-4">
                        <?php
                        include '../conexao.php';

                        $sql_semana = "select * from dias_semana";

                        $retorno_semana = mysqli_query($conexao, $sql_semana);
                        
                        while ($linha_dias_semana = mysqli_fetch_array($retorno_semana)) {
                            $check = '';
                            for ($i = 0; $i < count($dias); $i++) {
                                $dias[$i];

                                if ($dias[$i] == $linha_dias_semana['id']) {
                                    $check = 'checked';
                                }
                            }
                            ?>

                            <br>
                            <div class="custom-checkbox custom-control">
                                <input <?= $check ?> type="checkbox" class="custom-control-input" id="defaultUnchecked" type="checkbox" name="dias_semana[]" value="<?= $linha_dias_semana['id'] ?>"><?= $linha_dias_semana['dias_semana'] ?>
                            </div>
                            <?php
                        }
                        ?>
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
