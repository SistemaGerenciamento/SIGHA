<?php

include '../conexao.php';

$id = $_GET['id'];

$sql = "delete from feriados where id=$id";

mysqli_query($conexao, $sql);

header('Location: form_feriado_motivo.php');

?>

