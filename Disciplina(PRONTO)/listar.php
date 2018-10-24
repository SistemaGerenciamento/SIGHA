<?php
include '../conexao.php';

$sql = "SELECT DISTINCT disciplina.id AS disciplinaID, disciplina.nome, disciplina.carga_horaria, disciplina.horas_dia, professores.nome AS professor_nome, turno.turno, dias_semana.dias_semana FROM disciplina JOIN dias_semana, turno, professores, disciplina_semana_turno_professor WHERE disciplina.id = disciplina_semana_turno_professor.disciplina_id AND professores.id = disciplina_semana_turno_professor.professor_id AND dias_semana.id = disciplina_semana_turno_professor.semana_id AND turno.id = disciplina_semana_turno_professor.turno_id;";

$retorno = mysqli_query($conexao, $sql);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../funcoes_js/alertaExclusaoD.js"></script>
    </head>
    <body>

        <div class="container">
            <div class="header clearfix">
                <div class="table-responsive">
                    <table class="table table-bordered" border="1">
                        <tr>
                            <td>Disciplina</td><td>Carga horária</td><td>Horas/dia</td><td>Dias da semana</td><td>Turno</td><td>Professor(a)</td><td>Excluir</td><td>Alterar</td><td>Imprimir</td>
                        </tr>

<?php
while ($linha = mysqli_fetch_array($retorno)) {
    ?>

                            <tr>
                                <td><?= $linha['nome'] ?></td>
                                <td><?= $linha['carga_horaria'] ?>h</td>
                                <td><?= $linha['horas_dia'] ?>h</td>
                                <td><?= $linha['dias_semana'] ?></td>
                                <td><?= $linha['turno'] ?></td>
                                <td><?= $linha['professor_nome'] ?></td>

                                <td><a onclick="alertaExclusao(<?= $linha['disciplinaID'] ?>)" href="javascript:func()">
                                        <img src="../img/excluir.jpeg" height="30" width="30"/></a></td>

                                <td><a href="form_alterar.php?disciplinaID=<?= $linha['disciplinaID'] ?>">
                                        <img src="../img/alterar.png" height="30" width="30"/></a></td>
                                        
                                <td><a href="../Imprimir/imprimir_disciplina.php?disciplinaID=<?= $linha['disciplinaID'] ?>">
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
