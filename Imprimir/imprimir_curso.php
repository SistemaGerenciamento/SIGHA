<?php
include '../conexao.php';
include '../autenticacao.php';
autenticar();
sessaoExpirada();
include '../menu.php';

$id = $_GET['id'];

$sql = "select curso.id, curso.modulo, curso_disciplina.curso_id, curso.nome, disciplina.nome as disciplina, "
        . " curso.carga_horaria, curso.tipo, curso.turno, date_format(curso.data_inicio, '%d/%m/%Y') as data_inicio, date_format(curso.data_termino, '%d/%m/%Y') as data_termino"
        . " from curso_disciplina "
        . " inner join curso, disciplina where curso.id = curso_id "
        . " and disciplina.id = disciplina_id and curso.id = $id";

$sql_exibi_carga_horaria = "select sum(disciplina.carga_horaria) as carga_horaria from disciplina, curso, curso_disciplina where "
        . " disciplina.id = curso_disciplina.disciplina_id and curso.id = curso_disciplina.curso_id and "
        . " curso.id = $id";
$retorno_exibi_carga_horaria = mysqli_query($conexao, $sql_exibi_carga_horaria);
$linha_exibi_carga_horaria = mysqli_fetch_array($retorno_exibi_carga_horaria);

$retorno = mysqli_query($conexao, $sql);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../funcoes_js/alertaExclusao.js"></script>
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
                            <td>Curso</td><td>Carga horária</td><td>Tipo</td><td>Turno</td><td>Data de início</td><td>Data de término</td><td>Disciplinas</td><td>Modulo</td>
                        </tr>

                        <?php
                        while ($linha = mysqli_fetch_array($retorno)) {
                            ?>

                            <tr>
                                <td><?= $linha['nome'] ?></td>
                                <td><?= $linha_exibi_carga_horaria['carga_horaria'] ?>h</td>
                                <td><?= $linha['tipo'] ?></td>
                                <td><?= $linha['turno'] ?></td>
                                <td><?= $linha['data_inicio'] ?></td>
                                <td><?= $linha['data_termino'] ?></td>
                                <td><?= $linha['disciplina'] ?></td>
                                <td><?= $linha['modulo'] ?></td>





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
