<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css_3.3.7/bootstrap.min.css">
        <link rel="stylesheet" href="../js_4.1/bootstrap.min.js">   
    </head>
    <body>

        <?php
        include '../autenticacao.php';        
        include '../conexao.php';
        autenticar();
        sessaoExpirada();
        include '../menu.php';

        $id = $_GET['id'];

        $sql = "select curso.id, curso.modulo, curso_id, curso.nome, curso.carga_horaria, curso.tipo, "
                . " curso.turno, curso.data_inicio, curso.data_termino "
                . " from curso_disciplina "
                . " inner join curso ,disciplina where curso.id = $id";

        $retorno = mysqli_query($conexao, $sql);

        $linha = mysqli_fetch_array($retorno);

        $disciplinas = array();

        $sql_curso_disciplina = "SELECT * FROM curso_disciplina WHERE curso_id = $id";

        $retorno_curso_disciplina = mysqli_query($conexao, $sql_curso_disciplina);

        while ($linha2 = mysqli_fetch_array($retorno_curso_disciplina)) {
            array_push($disciplinas, $linha2['disciplina_id']);
        }
        ?>

        <div class="container">
            <div class="header clearfix">
                <div class="container-fluid">
                    <h2>Alterar Cadastro de Cursos</h2>
                    <form method="post" class="form-horizontal" action="alterar.php">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="curso">Curso:</label>
                                <div class="col-sm-4">          
                                    <input type="text" class="form-control" id="curso" placeholder="Digite o curso" name="curso" required value="<?= $linha['nome'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="modulo">Modulo:</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="modulo" required>

                                        <?php
                                        if ($linha['modulo'] == '01') {
                                            ?>
                                            <option selected value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        if ($linha['modulo'] == '02') {
                                            ?>
                                            <option value="01">01</option>
                                            <option selected value="02">02</option>
                                            <option value="03">03</option>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        if ($linha['modulo'] == '03') {
                                            ?>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option selected value="03">03</option>                                            <?php
                                    }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tipo">Tipo:</label>
                                <div class="col-sm-4">
                                    <?php
                                    if ($linha['tipo'] == 'Tecnico') {
                                        ?>

                                        <input checked="" type="radio" name="tipo" value="Tecnico" required> Técnico
                                        <input type="radio" name="tipo" value="FIC" required> FIC 
                                        <input type="radio" name="tipo" value="Superior" required> Superior

                                        <?php
                                    } elseif ($linha['tipo'] == 'FIC') {
                                        ?>        

                                        <input type="radio" name="tipo" value="Tecnico" required> Técnico
                                        <input checked="" type="radio" name="tipo" value="FIC" required> FIC 
                                        <input type="radio" name="tipo" value="Superior" required> Superior

                                        <?php
                                    } else {
                                        ?>

                                        <input type="radio" name="tipo" value="Tecnico" required> Técnico
                                        <input type="radio" name="tipo" value="FIC" required> FIC 
                                        <input checked="" type="radio" name="tipo" value="Superior" required> Superior

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-2" for="turno">Turno:</label>
                                <div class="col-sm-4">                           
                                    <?php
                                    if ($linha['turno'] == 'Matutino') {
                                        ?>

                                        <input checked="" type="radio" name="turno" value="Matutino" required> Matutino
                                        <input type="radio" name="turno" value="Vespertino" required> Vespertino
                                        <input type="radio" name="turno" value="Noturno" required> Noturno

                                        <?php
                                    } elseif ($linha['turno'] == 'Vespertino') {
                                        ?>

                                        <input type="radio" name="turno" value="Matutino" required> Matutino
                                        <input checked="" type="radio" name="turno" value="Vespertino" required> Vespertino
                                        <input type="radio" name="turno" value="Noturno" required> Noturno    

                                        <?php
                                    } else {
                                        ?>

                                        <input type="radio" name="turno" value="Matutino" required> Matutino
                                        <input type="radio" name="turno" value="Vespertino" required> Vespertino
                                        <input checked="" type="radio" name="turno" value="Noturno" required> Noturno    

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="data_inicio">Data início:</label>
                                <div class="col-sm-4">
                                    Data de início: <input type="date" name="data_inicio" value="<?= $linha['data_inicio'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="data_termino">Data término:</label>
                                <div class="col-sm-4">
                                    Data de término: <input type="date" name="data_termino" value="<?= $linha['data_termino'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="disciplina">Disciplina:</label>
                                <div class="col-sm-4">
                                    <?php
                                    include '../conexao.php';

                                    $sql_disciplina = "select * from disciplina";

                                    $retorno_disciplina = mysqli_query($conexao, $sql_disciplina);
                                    ?>
                                    <?php
                                    while ($linha_disciplina = mysqli_fetch_array($retorno_disciplina)) {
                                        $check = '';
                                        for ($i = 0; $i < count($disciplinas); $i++) {
                                            $disciplinas[$i];
                                            if ($disciplinas[$i] == $linha_disciplina['id']){
                                                $check = 'checked';
                                            }
                                        }
                                        
                                        ?>

                                        <br>
                                        <input <?= $check ?> type="checkbox" name="disciplinas[]" value="<?= $linha_disciplina['id'] ?>"><?= $linha_disciplina['nome'] ?>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-4">
                                    <button type="submit" class="btn btn-default">Alterar</button>
                                </div>
                            </div>

                    </form>

                    </body>
                    </html>
