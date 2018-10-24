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
        include '../menu.php';
        ?>

        <?php
        ini_set('display_errors', TRUE);

        $id = $_GET['id'];

        $sql_data_inicio = "SELECT (data_inicio) FROM curso where id = $id";
        $retorno_data_inicio = mysqli_query($conexao, $sql_data_inicio);
        $linha_data_inicio = mysqli_fetch_array($retorno_data_inicio);

        $sql_data_termino = "SELECT (data_termino) FROM curso where id = $id";
        $retorno_data_termino = mysqli_query($conexao, $sql_data_termino);
        $linha_data_termino = mysqli_fetch_array($retorno_data_termino);

        $sql_curso = "SELECT (nome) FROM curso WHERE id = $id";
        $retorno_curso = mysqli_query($conexao, $sql_curso);
        $linha_curso = mysqli_fetch_array($retorno_curso);
        
        $sql_exibi_carga_horaria = "select sum(disciplina.carga_horaria) from disciplina, curso, curso_disciplina where "
                . " disciplina.id = curso_disciplina.disciplina_id and curso.id = curso_disciplina.curso_id and "
                . " curso.id = $id";
        $retorno_exibi_carga_horaria = mysqli_query($conexao, $sql_exibi_carga_horaria);
        $linha_exibi_carga_horaria = mysqli_fetch_array($retorno_exibi_carga_horaria);

        $diaseguinte = -1;
        $carga_horaria_distribuir = 0;
        $carga_horaria_interromper = 0;

        $linha_data_intervalo = array();
        $linha_data_nome = array();
        $linha_converter = array();
        $identificador = array();
        $identificador_feriados = array();
        $identificador_feriados_converter = array();
        ?>

        <div class="container">
            <div class="header clearfix">
                <div class="table-responsive">
                    <h4>Carga Horária: <?= $linha_exibi_carga_horaria[0]; ?>h</h4>
                    <table class="table table-bordered" border="1">
                        <tr>
                            <td>Data</td><td>Dia da Semana</td><td>Curso</td><td>Disciplina</td>
                        </tr>

                        <?php
                        while (implode("", $linha_data_intervalo) != implode("", $linha_data_termino)) {

                            $sql_data_intervalo = "SELECT (data_inicio + interval " . $diaseguinte = $diaseguinte + 1 . " day) FROM curso where id = $id";
                            $retorno_data_intervalo = mysqli_query($conexao, $sql_data_intervalo);
                            $linha_data_intervalo = mysqli_fetch_array($retorno_data_intervalo);

                            $sql_data_semana = "SELECT dayname('$linha_data_intervalo[0]') FROM curso where id = $id";
                            $retorno_data_semana = mysqli_query($conexao, $sql_data_semana);
                            $linha_data_semana = mysqli_fetch_array($retorno_data_semana);

                            $sql_identificar_dias = "SELECT DISTINCT curso_disciplina.curso_id, curso.nome as curso, curso_disciplina.disciplina_id, disciplina.nome as "
                                    . " disciplina, disciplina.horas_dia, disciplina_semana.semana_id, dias_semana.dias_semana FROM curso_disciplina "
                                    . " inner join disciplina_semana, curso, disciplina, dias_semana where curso_id = "
                                    . " curso.id and curso.id = $id and curso_disciplina.disciplina_id = "
                                    . " disciplina_semana.disciplina_id and disciplina_semana.disciplina_id = "
                                    . " disciplina.id and dias_semana.id = disciplina_semana.semana_id";
                            $retorno_identificar_dias = mysqli_query($conexao, $sql_identificar_dias);
                            while ($linha_identificar_dias = mysqli_fetch_array($retorno_identificar_dias)) {
                                array_push($identificador, $linha_identificar_dias['dias_semana']);
                            }

                            $sql_identificar_feriados = "SELECT date_format(feriado, '%d/%m') FROM feriados as feriado";
                            $retorno_identificar_feriados = mysqli_query($conexao, $sql_identificar_feriados);
                            while ($linha_identificar_feriados = mysqli_fetch_array($retorno_identificar_feriados)) {
                                array_push($identificador_feriados, $linha_identificar_feriados["date_format(feriado, '%d/%m')"]);
                            }

                            switch ($linha_data_semana[0]) {
                                case "Monday":
                                    $linha_data_semana[0] = "Segunda-Feira";
                                    break;

                                case "Tuesday":
                                    $linha_data_semana[0] = "Terca-Feira";
                                    break;

                                case "Wednesday":
                                    $linha_data_semana[0] = "Quarta-Feira";
                                    break;

                                case "Thursday":
                                    $linha_data_semana[0] = "Quinta-Feira";
                                    break;

                                case "Friday":
                                    $linha_data_semana[0] = "Sexta-Feira";
                                    break;

                                case "Saturday":
                                    $linha_data_semana[0] = "Sabado";
                                    break;

                                case "Sunday":
                                    $linha_data_semana[0] = "Domingo";
                                    break;

                                default:
                                    break;
                            }

                            $sql_converter = "SELECT date_format('$linha_data_intervalo[0]', '%d/%m/%Y') FROM curso where id = $id";
                            $retorno_converter = mysqli_query($conexao, $sql_converter);
                            $linha_converter = mysqli_fetch_array($retorno_converter);

                            $sql_converter_feriado = "SELECT date_format('$linha_data_intervalo[0]', '%d/%m') FROM curso where id = $id";
                            $retorno_converter_feriado = mysqli_query($conexao, $sql_converter_feriado);
                            $linha_converter_feriado = mysqli_fetch_array($retorno_converter_feriado);

                            if (!in_array($linha_converter_feriado[0], $identificador_feriados)) {
                                ?>

                                <tr>
                                    <td>
                                        <?php
                                        if (!empty($linha_data_termino[0])) {
                                            echo ($linha_converter[0]);
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        if (!empty($linha_data_termino[0])) {
                                            echo ($linha_data_semana[0]);
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        if (!empty($linha_data_termino[0])) {
                                            for ($index = 0; $index < count($identificador); $index++) {
                                                if ($linha_data_semana[0] == $identificador[$index]) {
                                                    echo $linha_curso['nome'];
                                                    break;
                                                }
                                            }
                                        }
                                        ?>

                                    </td>

                                    <td id="disciplina">
                                        <?php
                                        if (!empty($linha_data_termino[0])) {
                                            $sql_semana = "SELECT DISTINCT curso_disciplina.curso_id, curso.nome as curso, "
                                                    . " curso.carga_horaria,curso_disciplina.disciplina_id, disciplina.nome as disciplina, "
                                                    . " disciplina.horas_dia, disciplina_semana.semana_id, dias_semana.dias_semana as diasSemana FROM curso_disciplina "
                                                    . " inner join disciplina_semana, curso, disciplina, dias_semana where curso_id = "
                                                    . " curso.id and curso.id = $id and curso_disciplina.disciplina_id = disciplina_semana.disciplina_id "
                                                    . " and disciplina_semana.disciplina_id = disciplina.id and dias_semana.id = "
                                                    . " disciplina_semana.semana_id and dias_semana.dias_semana = '$linha_data_semana[0]'";
                                            $retorno_semana = mysqli_query($conexao, $sql_semana);
                                            while ($linha_semana = mysqli_fetch_array($retorno_semana)) {
                                                if ($linha_semana['horas_dia'] > 0) {
                                                    $sql_horas_dia = "SELECT DISTINCT sum(disciplina.horas_dia) as horas_dia FROM curso_disciplina inner join disciplina_semana, "
                                                            . " curso, disciplina, dias_semana where curso_id = curso.id and curso.id = $id and curso_disciplina.disciplina_id "
                                                            . " = disciplina_semana.disciplina_id and disciplina_semana.disciplina_id = "
                                                            . " disciplina.id and dias_semana.id = disciplina_semana.semana_id and dias_semana.dias_semana = '$linha_data_semana[0]'";
                                                    $retorno_horas_dia = mysqli_query($conexao, $sql_horas_dia);
                                                    $linha_horas_dia = mysqli_fetch_array($retorno_horas_dia);
                                                }
                                                if ($carga_horaria_interromper == 0) {
                                                    $carga_horaria_distribuir = $linha_semana['carga_horaria'];
                                                }
                                                $carga_horaria_interromper = 1;
                                                for ($index1 = 0; $index1 < count($identificador); $index1++) {
                                                    if ($linha_semana['diasSemana'] == $identificador[$index1]) {
                                                        echo $linha_semana['disciplina'];
                                                        $carga_horaria_distribuir = $carga_horaria_distribuir - $linha_semana['horas_dia'];
                                                        echo $carga_horaria_distribuir;
                                                        if ($carga_horaria_distribuir == 0){
                                                            die();
                                                        }
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        ?>

                                <tr style="background: red">
                                    <?php
                                    
                                    $sql = "SELECT motivo, date_format(feriado, '%d/%m/%Y') AS feriado FROM feriados";
                                    $retorno = mysqli_query($conexao, $sql);
                                    while ($linha = mysqli_fetch_array($retorno)) {
                                        if ($linha['feriado'] == $linha_converter[0]){
                                            $exibi_motivo = $linha['motivo'];
                                        }
                                    }
                                    
                                    ?>
                                    <td><?php echo ($linha_converter[0]); ?></td>
                                    <td><?php echo ($linha_data_semana[0]) ?></td>
                                    <td colspan="2" align="center"><?php echo '<b>' . $exibi_motivo; ?></td>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                        </td>                            
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php
        if ($carga_horaria_distribuir < 0) {
            ?>
            <div class="container">
                <script type="text/javascript" src="../funcoes_js/alertaCargaHoráriaHoras.js"></script>
                <input type="submit" class="btn btn-success col-sm-4 offset-4" onclick="alertaCargaHorariaHoras(<?= $carga_horaria_distribuir ?>)" value="Validar distribuição">
            </div>

            <?php
        } elseif ($carga_horaria_distribuir > 0) {
            ?>
            <div class="container">
                <script type="text/javascript" src="../funcoes_js/alertaCargaHoráriaHoras.js"></script>
                <input type="submit" class="btn btn-success col-sm-4 offset-4" onclick="alertaCargaHorariaHoras(<?= $carga_horaria_distribuir ?>)" value="Validar distribuição">
            </div>
            <?php
        } else {
            ?>

            <div class="container">
                <script type="text/javascript" src="../funcoes_js/alertaCargaHoráriaHoras.js"></script>
                <input type="submit" class="btn btn-success col-sm-4 offset-4" onclick="alertaCargaHorariaHoras(<?= $carga_horaria_distribuir ?>)" value="Validar distribuição">
            </div>
            <?php
        }
        ?> 
    </body>
</html>
