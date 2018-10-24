<?php

include '../conexao.php';

$motivo = $_POST['motivo'];
$data = $_POST['data'];


$sql = "insert into feriados values (default, '$motivo','$data')";

mysqli_query($conexao, $sql);

header('Location: form_feriado_motivo.php');
?>