<?php

include '../conexao.php';

$id = $_GET['disciplinaID'];

$sql = "delete from disciplina where id=$id";
$sql_associativo = "delete from disciplina_semana where disciplina_id=$id";

mysqli_query($conexao, $sql);
mysqli_query($conexao, $sql_associativo);

header('Location: form_disciplina.php');

?>

