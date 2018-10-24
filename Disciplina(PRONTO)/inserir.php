<?php

include '../conexao.php';
ini_set("display_errors", FALSE);

$curso_id = $_POST['curso_id'];
$disciplina = $_POST['nome'];
$carga_horaria = $_POST['carga_horaria'];
$horas_dia = $_POST['horas_dia'];
$professor_id = $_POST['professor_id'];
$turno_id = $_POST['turno_id'];
$array_id = $_POST['dias_semana'];

echo '<br>';
if (!empty($disciplina) && !empty($carga_horaria) && !empty($professor_id) && !empty($array_id)) {

    $sql = "insert into disciplina values (default, '$disciplina', $carga_horaria, $horas_dia)";
    echo $sql;
}

mysqli_query($conexao, $sql);
$ultimo_id = mysqli_insert_id($conexao);

foreach ($array_id as $dia_semana) {
    $sql = "insert into curso_disciplina_turno_professor_dias_semana values ($curso_id, $ultimo_id, $turno_id, $professor_id, $dia_semana);";
    echo $sql;
    mysqli_query($conexao, $sql);
}

//header('Location: form_disciplina.php');
?>