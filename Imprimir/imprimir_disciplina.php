<?php
        include '../conexao.php';
        include '../autenticacao.php';
        autenticar();
        sessaoExpirada();
include '../menu.php';

$id = $_GET['disciplinaID'];

$sql = "select disciplina.id as disciplinaID, disciplina_id, disciplina.nome, disciplina.carga_horaria, "
        . " dias_semana.dias_semana, professores.id as professorID, professores.nome as professor_nome, "
        . " disciplina.professor_id from disciplina_semana inner join disciplina ,dias_semana, "
        . " professores where disciplina_id = disciplina.id and semana_id = dias_semana.id and "
        . " professores.id = disciplina.professor_id and disciplina.id = $id order by disciplina.nome";

$retorno = mysqli_query($conexao, $sql);
?>

<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="../funcoes_js/alertaExclusaoD.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css_3.3.7/bootstrap.min.css">
        <link rel="stylesheet" href="../js_4.1/bootstrap.min.js">
    </head>
    <body>

        <div class="container">
            <div class="header clearfix">
                <div class="table-responsive">
                    <table class="table table-bordered" border="1">
                        <tr>
                            <td>Disciplina</td><td>Carga horária</td><td>Dias da semana</td><td>Professor</td>
                        </tr>

                        <?php
                        while ($linha = mysqli_fetch_array($retorno)) {
                            ?>

                            <tr>
                                <td><?= $linha['nome'] ?></td>
                                <td><?= $linha['carga_horaria'] ?>h</td>
                                <td><?= $linha['dias_semana'] ?></td>
                                <td><?= $linha['professor_nome'] ?></td>

                            </tr>

                            <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="form-group">        
                <div class="col-sm-offset-0 col-sm-4">
                    <button type="submit" class="btn btn-default" onclick="window.print()">Imprimir</button>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
