<?php
include '../conexao.php';

$sql = "SELECT curso.id, curso.nome, curso.tipo, curso.turno, date_format(curso.data_inicio, '%d/%m/%Y') AS data_inicio, date_format(curso.data_termino, '%d/%m/%Y') AS data_termino, curso.modulo FROM curso;";

$retorno = mysqli_query($conexao, $sql);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../funcoes_js/alertaExclusao.js"></script>
    </head>
    <body>

        <div class="container">
            <div class="header clearfix">
                <div class="table-responsive">
                    <table class="table table-bordered" border="1">
                        <tr>
                            <td>Curso</td><td>Tipo</td><td>Turno</td><td>Data de início</td><td>Data de término</td><td>Módulo</td><td>Verificação</td><td>Exluir</td><td>Alterar</td><td>Imprimir</td>
                        </tr>

                        <?php
                        while ($linha = mysqli_fetch_array($retorno)) {
                            ?>

                            <tr>
                                <td><?= $linha['nome']; ?></td>
                                <td><?= $linha['tipo']; ?></td>
                                <td><?= $linha['turno']; ?></td>
                                <td><?= $linha['data_inicio']; ?></td>
                                <td><?= $linha['data_termino']; ?></td>
                                <td><?= $linha['modulo']; ?></td>
                                
                                <td><a href="../Calendario/calendario.php?id=<?= $linha['id'] ?>">
                                        <img src="../img/calendario.png" height="30" width="30"/></a></td>

                                <td><a onclick="alertaExclusao(<?= $linha['id'] ?>)" href="javascript:func()">
                                        <img src="../img/excluir.jpeg" height="30" width="30"/></a></td>

                                <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                        <img src="../img/alterar.png" height="30" width="30"/></a></td>

                                <td><a href="../Imprimir/imprimir_curso.php?id=<?= $linha['id'] ?>">
                                        <img src="../img/impressora.jpg" height="30" width="30"/></a></td>



                            </tr>


                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
