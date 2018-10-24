<?php
include '../conexao.php';

$sql = "select id, motivo, date_format(feriado, '%d/%m/%Y') as feriado from feriados";

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
                            <td>Motivo</td><td>Feriado</td><td>Excluir</td><td>Alterar</td>
                        </tr>

                        <?php
                        while ($linha = mysqli_fetch_array($retorno)) {
                            ?>

                            <tr>
                                <td><?= $linha['motivo'] ?></td>
                                <td><?= $linha['feriado'] ?></td>

                                <td><a onclick="alertaExclusao(<?= $linha['id'] ?>)" href="javascript:func()">
                                        <img src="../img/excluir.jpeg" height="30" width="30"/></a></td>

                                <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                        <img src="../img/alterar.png" height="30" width="30"/></a></td>
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
