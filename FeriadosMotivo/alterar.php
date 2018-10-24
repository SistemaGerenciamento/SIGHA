<?php

include '../conexao.php';

$id = $_POST['id'];
$motivo = $_POST['motivo'];
$data = $_POST['data'];

$sql = "update feriados set motivo='$motivo', feriado='$data' where id = $id";

mysqli_query($conexao, $sql);

header('Location: form_feriado_motivo.php');

?>
