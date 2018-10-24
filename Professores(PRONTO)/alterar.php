<?php
ini_set('display_errors', FALSE);
include '../conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$carga_horaria = $_POST['carga_horaria'];
$email = $_POST['email'];
$array_id = $_POST['dias_semana'];

if (!empty($array_id)) {

    $sql = "update professores set nome='$nome', carga_horaria=$carga_horaria, email='$email' where id = $id";

    mysqli_query($conexao, $sql);

    $sql_delete = "delete from professor_semana where professor_id = $id";

    mysqli_query($conexao, $sql_delete);

    foreach ($array_id as $dias_semana) {
        $sql_professor_semana = "insert into professor_semana values ($id, $dias_semana[id]);";

        mysqli_query($conexao, $sql_professor_semana);
    }
}
header('Location: form_professores.php');
?>
