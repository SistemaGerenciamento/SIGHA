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
        $id = $_GET['disciplinaID'];

        $sql = "select distinct disciplina.id as disciplinaID, semana_id, disciplina_id, disciplina.nome "
                . " as disciplina_nome, "
                . " disciplina.carga_horaria, professores.id as professorID, disciplina.professor_id, "
                . " professores.nome, disciplina.horas_dia from disciplina_semana inner join disciplina, "
                . " professores where disciplina.id = $id and professores.id = disciplina.professor_id";

        $retorno = mysqli_query($conexao, $sql);

        $linha = mysqli_fetch_array($retorno);

        $dias = array();

        $sql_dias_semana = "SELECT * from disciplina_semana where disciplina_id = $id";

        $retorno_dias_semana = mysqli_query($conexao, $sql_dias_semana);

        while ($linha2 = mysqli_fetch_array($retorno_dias_semana)) {
            array_push($dias, $linha2['semana_id']);
        }
        ?>

        <br>
        <br>

        <div class="container">
            <div class="header clearfix">
                <div class="container-fluid">
                    <h2>Alterar Cadastro de Disciplinas</h2>
                    <form method="post" class="form-horizontal" action="alterar.php">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nome">Nome:</label>
                            <div class="col-sm-4">
                                <input type="hidden" name="id" value="<?= $linha['disciplinaID'] ?>">
                                <input type="hidden" name="disciplina_id" value="<?= $linha['disciplina_id'] ?>">
                                <input type="text" class="form-control" id="nome" placeholder="Digite a disciplina" name="nome" required value="<?= $linha['disciplina_nome'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="carga_horaria">Carga horária:</label>
                            <div class="col-sm-4">          
                                <input type="number" class="form-control" id="carga_horaria" placeholder="Digite a carga horária" name="carga_horaria" required value="<?= $linha['carga_horaria'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="horas_dia">Horas/dia:</label>
                            <div class="col-sm-4">          
                                <input type="number" class="form-control" id="Horas/dia" placeholder="Digite horas/dia" name="horas_dia" required value="<?= $linha['horas_dia'] ?>">
                            </div>
                        </div>

                        <script>
                            function showUser(id) {
                                if (id === "") {
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
                                    xmlhttp.open("GET", "ajax_alterar.php?id=" + id, true);
                                    xmlhttp.send();
                                }
                            }
                        </script>

                        <?php
                        include '../conexao.php';
                        $sql = "select * from professores";

                        $retorno = mysqli_query($conexao, $sql);
                        ?>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for="professor">Professor:</label>
                            <div class="col-sm-4">
                                <select id="professor_id" class="form-control" onchange="showUser(this.value)" name="professor_id" required>
                                    <option value="">Selecione um professor:</option>
                                    <?php
                                    while ($linha = mysqli_fetch_array($retorno)) {
                                        ?>

                                        <option value="<?= $linha['id'] ?>"> <?= $linha['nome'] ?> </option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div id="txtHint"></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
