<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css_3.3.7/bootstrap.min.css">
        <link rel="stylesheet" href="../jsCssSalvo/jquery.min.js">
        <link rel="stylesheet" href="../jsCssSalvo/popper.min.js">
        <link rel="stylesheet" href="../js_4.1/bootstrap.min.js">
    </head>
    <body>

        <?php
        include '../autenticacao.php';
        include '../conexao.php';
        autenticar();
        sessaoExpirada();
        include '../menu.php';
        ?>

        <br>
        <br>

        <div class="container">
            <div class="header clearfix">
                <div class="container-fluid">
                    <h2>Cadastro de Cursos</h2>

                    <form method="post" class="form-horizontal" action="inserir.php">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="curso">Curso:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="curso" placeholder="Digite o curso" name="curso" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="modulo">Modulo:</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="modulo" required>

                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tipo">Tipo:</label>
                            <div class="col-sm-4">
                                <input type="radio" name="tipo" value="Tecnico" required> Técnico
                                <input type="radio" name="tipo" value="FIC" required> FIC
                                <input type="radio" name="tipo" value="Superior" required> Superior
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="carga_horaria">Data início:</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="carga_horaria">Data término:</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="data_termino" name="data_termino" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nome">Turno:</label>
                            <div class="col-sm-4">
                                <input onchange="myFunction(this.value)" type="radio" name="turno" value="Matutino" required> Matutino
                                <input onchange="myFunction(this.value)" type="radio" name="turno" value="Vespertino" required> Vespertino
                                <input onchange="myFunction(this.value)" type="radio" name="turno" value="Noturno" required> Noturno
                            </div>
                        </div>
                        <div class="form-group">  
                            <label class="control-label col-sm-2" for="dias_semana" id="dias_semana">Restricoes:</label>
                            <div class="col-sm-7">
                                <?php
                                $sql = "SELECT * FROM dias_semana;";

                                $retorno = mysqli_query($conexao, $sql);

                                while ($linha = mysqli_fetch_array($retorno)) {
                                    ?>

                                    <input type="checkbox" name="dias_semana[]" id="dias_semana" value="<?= $linha['id'] ?>"><?= $linha['dias_semana'] ?>

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
                    </form>

                    <?php
                    include './listar.php';
                    ?> 
                </div>
            </div>
        </div>
    </body>
</html>
