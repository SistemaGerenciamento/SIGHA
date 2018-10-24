<?php
include '../conexao.php';

$sql = "SELECT DISTINCT * FROM professores;";

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
                            <td>Nome</td><td>Carga Horária</td><td>E-mail</td><td>Excluir</td><td>Alterar</td>
                        </tr>

                        <?php
                        while ($linha = mysqli_fetch_array($retorno)) {
                            ?>

                            <tr>
                                <td><?= $linha['nome'] ?></td>
                                <td><?= $linha['carga_horaria'] ?>h</td>
                                <td><?= $linha['email'] ?></td>

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
