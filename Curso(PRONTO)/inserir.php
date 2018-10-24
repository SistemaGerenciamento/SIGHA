<?php
ini_set('display_errors', FALSE);
include '../conexao.php';

$curso = $_POST['curso'];

$tipo = $_POST['tipo'];

$turno = $_POST['turno'];

$data_inicio = $_POST['data_inicio'];

$data_termino = $_POST['data_termino'];

$modulo = $_POST['modulo'];

$array_id = $_POST['dias_semana'];


if(!empty($curso) && !empty($tipo) && !empty($data_inicio) && !empty($data_termino)){
 
    $sql = "insert into curso values (default, '$curso', '$tipo', '$turno', '$data_inicio', '$data_termino', '$modulo')";
    
}

mysqli_query($conexao, $sql);

$ultimo_id = mysqli_insert_id($conexao);

if(!empty($array_id)){

foreach ($array_id as $dia) {
    $sql_curso_dias = "insert into curso_dias values ($ultimo_id, $dia[id])";
    
    mysqli_query($conexao, $sql_curso_dias);
  
    echo $sql_curso_dias;
    
    }
} else {
    $sql_curso_dias = "insert into curso_dias values ($ultimo_id, 0])";
    
    mysqli_query($conexao, $sql_curso_dias);
}

header('Location: form_curso.php');
?>