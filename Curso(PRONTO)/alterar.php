<?php
ini_set('display_errors', FALSE);
include '../conexao.php';

$id = $_POST['id'];

$curso = $_POST['curso'];

$curso_id = $_POST['curso_id'];

$tipo = $_POST['tipo'];

$turno = $_POST['turno'];

$data_inicio = $_POST['data_inicio'];

$data_termino = $_POST['data_termino'];

$modulo = $_POST['modulo'];

$array_id = $_POST['disciplinas'];

for ($index = 0; $index < count($array_id); $index++) {
    $sql_carga_horaria = "select * from disciplina where id = $array_id[$index]";
    $retorno_carga_horaria = mysqli_query($conexao, $sql_carga_horaria);
    while ($linha_carga_horaria = mysqli_fetch_array($retorno_carga_horaria)) {
        $carga_horaria = $carga_horaria + $linha_carga_horaria['carga_horaria'];
    }
}

if (!empty($array_id)) {

    $sql_curso = "update curso set nome='$curso', modulo='$modulo', carga_horaria=$carga_horaria, "
            . " tipo='$tipo', turno='$turno', data_inicio='$data_inicio', data_termino='$data_termino'"
            . " where id = $id";

    mysqli_query($conexao, $sql_curso);

    $sql_delete = "delete from curso_disciplina where curso_id = $id";

    mysqli_query($conexao, $sql_delete);

    foreach ($array_id as $disciplinas) {
        $sql_curso_disciplina = "insert into curso_disciplina values ($id, $disciplinas[id])";

        mysqli_query($conexao, $sql_curso_disciplina);
    }
}

header('Location: form_curso.php');
?>
