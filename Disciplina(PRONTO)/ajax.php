<?php
ini_set('DISPLAY_ERROS', TRUE);
include_once '../autenticacao.php';
include '../conexao.php';

$dias_restricoes = array();
$dias_restricoes_curso = array();
$restricoes_turnos = array();
$restricoes_turnos_professor = array();

$professor_id = intval($_GET['professor_id']);
$curso_id = intval($_GET['curso_id']);
$turno_id = intval($_GET['turno_id']);

$sql_restricoes_turno = "SELECT DISTINCT professores.nome, professores_dias_aulas_turno.dias_semana_id, turno.id AS turno_id FROM professores JOIN professores_dias_aulas_turno, turno, dias_semana WHERE professores_dias_aulas_turno.professor_id = professores.id AND professores.id = $professor_id AND turno.id = professores_dias_aulas_turno.turno_id AND turno.id = $turno_id AND dias_semana.id = professores_dias_aulas_turno.dias_semana_id;";

$retorno_restricoes_turno = mysqli_query($conexao, $sql_restricoes_turno);

while ($linha_restrioces_turno = mysqli_fetch_array($retorno_restricoes_turno)) {
    array_push($restricoes_turnos, $linha_restrioces_turno['dias_semana_id']);
}

$sql_restricoes_curso = "SELECT * FROM curso_dias WHERE curso_id= $curso_id";

$retorno_restricoes_curso = mysqli_query($conexao, $sql_restricoes_curso);

while ($linha_restricoes_curso = mysqli_fetch_array($retorno_restricoes_curso)) {
    array_push($dias_restricoes_curso, $linha_restricoes_curso['dias_semana_id']);
}

$dias_restricoes_todo_dia = array();

$sql_restircoes_todo_dia = "SELECT DISTINCT professores.nome, professores_dias_aulas_turno.dias_semana_id FROM professores JOIN professores_dias_aulas_turno, turno, dias_semana WHERE professores_dias_aulas_turno.professor_id = professores.id AND professores.id = $professor_id AND turno.id = professores_dias_aulas_turno.turno_id AND turno.id = 10 AND dias_semana.id = professores_dias_aulas_turno.dias_semana_id;";

$retorno_restrioces_todo_dia = mysqli_query($conexao, $sql_restircoes_todo_dia);

while ($linha_restricoes_todo_dia = mysqli_fetch_array($retorno_restrioces_todo_dia)) {
    array_push($dias_restricoes_todo_dia, $linha_restricoes_todo_dia['dias_semana_id']);
}

$sql_dias_semana = "SELECT * FROM dias_semana";

$retorno_dias_semana = mysqli_query($conexao, $sql_dias_semana);
?>
<div class="form-group">
    <label class="control-label col-sm-2" for="dias_semana" id="dias_semana">Dias da Semana:</label>
    <div class="col-sm-4">
        <?php
        while ($linha_dias_semana = mysqli_fetch_array($retorno_dias_semana)) {
            $desabilitado = "";
            $avisos = "";
            $check = "";
            foreach ($restricoes_turnos as $dia) {
                if ($linha_dias_semana['id'] == $dia) {
                    $desabilitado = "disabled";
                    $check = "checked";
                }
            }
            foreach ($dias_restricoes_todo_dia as $dia_todo_dia) {
                if ($linha_dias_semana['id'] == $dia_todo_dia) {
                    $desabilitado = "disabled";
                }
            }
            foreach ($dias_restricoes_curso as $dia_curso) {
                if ($linha_dias_semana['id'] == $dia_curso) {
                    $desabilitado = "disabled";
                }
            }
            ?>

            <br>
            <?= $avisos; ?><input type="checkbox" <?= $desabilitado ?> id="dias_semana" name="dias_semana[]" value="<?= $linha_dias_semana['id'] ?>"><?= $linha_dias_semana['dias_semana'] ?>

            <?php
        }
        ?>
    </div>
</div>

<div class="form-group">        
    <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-default">Cadastrar</button>
    </div>

