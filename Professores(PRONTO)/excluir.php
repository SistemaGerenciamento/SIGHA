<?php

include '../conexao.php';

$id = $_GET['id'];

$sql = "delete from professores where id=$id";
$sql_associativo = "delete from professor_dias_aula where professor_id=$id";

mysqli_query($conexao, $sql);
mysqli_query($conexao, $sql_associativo);

header('Location: form_professores.php');

?>

