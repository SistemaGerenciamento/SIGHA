<?php

include '../conexao.php';

$id = $_GET['id'];

$sql = "delete from curso where id=$id";
$sql_associativo = "delete from curso_dias where curso_id=$id";

mysqli_query($conexao, $sql);
mysqli_query($conexao, $sql_associativo);

header('Location: form_curso.php');

?>

