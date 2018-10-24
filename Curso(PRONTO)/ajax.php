<?php
include '../conexao.php';

$turno = strval($_GET['turno']);

$sql = "select * from disciplina";

$retorno = mysqli_query($conexao, $sql);

$sql_curso_verificacao = "SELECT curso.turno, disciplina.nome FROM curso JOIN disciplina, curso_disciplina WHERE turno = '$turno' AND curso.id = curso_disciplina.curso_id AND disciplina.id = curso_disciplina.disciplina_id;";

$retorno_curso_verificacao = mysqli_query($conexao, $sql_curso_verificacao);

$verificacao = array();

while ($linha_curso_verificacao = mysqli_fetch_array($retorno_curso_verificacao)) {
    array_push($verificacao, $linha_curso_verificacao['nome']);
}
?>

<div class="form-group">
    <label class="control-label col-sm-2" for="disciplina">Disciplina:</label>
    <div class="col-sm-4">
        <?php
        while ($linha = mysqli_fetch_array($retorno)) {
            $desabilitado = "";
            foreach ($verificacao as $value) {
                if ($value == $linha['nome']){
                    if ($linha['horas_dia'] < 4){
                        $desabilitado = "";
                    } else {
                        $desabilitado = 'disabled';
                    }
                    
                }
            }
            ?>

            <br>
            <input <?= $desabilitado ?> type="checkbox" name="disciplinas[]" value="<?= $linha['id'] ?>"><?= $linha['nome'] ?>

            <?php
        }
        ?>
    </div>
</div>
<div class="form-group">        
    <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-default">Cadastrar</button>
    </div>
</div>
