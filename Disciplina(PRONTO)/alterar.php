<?php

ini_set("display_errors", FALSE);

include '../conexao.php';

$id = $_POST['id'];

$nome = $_POST['nome'];

$disciplina_id = $_POST['disciplina_id'];

$carga_horaria = $_POST['carga_horaria'];

$horas_dia = $_POST['horas_dia'];

$professor_id = $_POST['professor_id'];

$array_id = $_POST['dias_semana'];

if (!empty($array_id)) {

    $sql_disciplina = "update disciplina set nome='$nome', carga_horaria=$carga_horaria, horas_dia=$horas_dia, professor_id=$professor_id "
            . " where id = $id";

    mysqli_query($conexao, $sql_disciplina);

    $sql_delete = "delete from disciplina_semana where disciplina_id = $id";

    mysqli_query($conexao, $sql_delete);

    foreach ($array_id as $dias_semana) {
        $sql_disciplina_semana = "insert into disciplina_semana values ($id, $dias_semana[id]);";

        mysqli_query($conexao, $sql_disciplina_semana);
    }    
} 

header('Location: form_disciplina.php');
?>
