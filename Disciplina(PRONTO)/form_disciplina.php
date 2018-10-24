<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css_3.3.7/bootstrap.min.css">
        <link rel="stylesheet" href="../js_4.1/bootstrap.min.js">
        <script src="../jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../funcoes_js/ajax.js"></script>
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
                    <h2>Cadastro de Disciplinas</h2>
                    <form method="post" class="form-horizontal" action="inserir.php">
                        <?php
                        $sql_curso = "SELECT * FROM curso;";

                        $retorno_curso = mysqli_query($conexao, $sql_curso);
                        ?>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="curso">Curso:</label>
                            <div class="col-sm-4">
                                <select onchange="pegarId()" id="curso_id" class="form-control" name="curso_id" required>
                                    <option value="0">Selecione um curso:</option>
                                    <?php
                                    while ($linha_curso = mysqli_fetch_array($retorno_curso)) {
                                        ?>

                                        <option value="<?= $linha_curso['id'] ?>"> <?= $linha_curso['nome'] ?> </option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nome">Nome:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nome" placeholder="Digite a disciplina" name="nome" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="carga_horaria">Carga horária:</label>
                            <div class="col-sm-4">          
                                <input type="number" class="form-control" id="carga_horaria" placeholder="Digite a carga horária" name="carga_horaria" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Horas/dia">Horas/dia:</label>
                            <div class="col-sm-4">          
                                <input type="number" class="form-control" id="Horas/dia" placeholder="Digite horas/dia" name="horas_dia" required>
                            </div>
                        </div>
                        <script>
                            function pegarId() {
                                var professor_id = document.getElementById("professor_id").value;
                                var curso_id = document.getElementById("curso_id").value;
                                var turno_id = document.getElementById("turno_id").value;
                                function showUser() {
                                    if (professor_id === 0 && curso_id) {
                                        document.getElementById("txtHint").innerHTML = "";
                                        return;
                                    } else {
                                        if (window.XMLHttpRequest) {
                                            // code for IE7+, Firefox, Chrome, Opera, Safari
                                            xmlhttp = new XMLHttpRequest();
                                        } else {
                                            // code for IE6, IE5
                                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                        }
                                        xmlhttp.onreadystatechange = function () {
                                            if (this.readyState === 4 && this.status === 200) {
                                                document.getElementById("txtHint").innerHTML = this.responseText;
                                            }
                                        };
                                        xmlhttp.open("GET", "ajax.php?professor_id=" + professor_id + "&curso_id= " + curso_id + "&turno_id= " + turno_id, true);
                                        xmlhttp.send();
                                    }
                                }
                                if (professor_id !== 0 && curso_id !== 0 && turno_id !== 0) {
                                    var funcaoAjax = showUser();
                                    funcaoAjax;
                                }
                            }

                        </script>

                        <?php
                        $sql = "SELECT * FROM professores;";

                        $retorno = mysqli_query($conexao, $sql);
                        ?>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="professor">Professor:</label>
                            <div class="col-sm-4">
                                <select onchange="pegarId()" id="professor_id" class="form-control" name="professor_id" required>
                                    <option value="0">Selecione um professor:</option>
                                    <?php
                                    while ($linha = mysqli_fetch_array($retorno)) {
                                        ?>

                                        <option value="<?= $linha['id'] ?>"> <?= $linha['nome']; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <?php
                        if (isset($_POST['curso_id'])) {
                            $curso_id = $_POST['curso_id'];
                            echo $curso_id;
                        }

                        $sql_dias_semana = "SELECT * FROM turno";

                        $retorno_dias_semana = mysqli_query($conexao, $sql_dias_semana);
                        ?>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="turno">Turno:</label>
                            <div class="col-sm-4">
                                <select onchange="pegarId()" id="turno_id" class="form-control" name="turno_id" required>
                                    <option value="0">Selecione um turno:</option>
                                    <?php
                                    while ($linha_dias_semana = mysqli_fetch_array($retorno_dias_semana)) {
                                        ?>

                                        <option value="<?= $linha_dias_semana['id'] ?>"> <?= $linha_dias_semana['turno'] ?> </option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div id="professorId"></div>
                        <div id="cursoId"></div>
                        <div id="txtHint"></div>
                    </form>

                    <br>
                    <br>

                    <?php
//                    include './listar.php';
                    ?> 
                </div>
            </div>
        </div>

    </body>
</html>
