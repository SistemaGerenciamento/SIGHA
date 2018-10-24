<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css_3.3.7/bootstrap.min.css">
        <link rel="stylesheet" href="../js_4.1/bootstrap.min.js">
    </head>
    <body>
        <?php
        include '../conexao.php';
        include '../autenticacao.php';
        autenticar();
        sessaoExpirada();
        include '../menu.php';
        ?>

        <br>
        <br>




        <div class="container">
            <div class="header clearfix">
                <div class="container-fluid">
                    <h2>Cadastro de Professores</h2>
                    <form method="post" class="form-horizontal" action="inserir.php">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nome">Nome:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nome" placeholder="Digite o nome" name="nome" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="carga_horaria">Carga horária:</label>
                            <div class="col-sm-4">          
                                <input type="number" class="form-control" id="carga_horaria" placeholder="Digite a carga horária" name="carga_horaria" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">E-mail:</label>
                            <div class="col-sm-4">          
                                <input type="email" class="form-control" id="email" placeholder="Digite o e-mail" name="email" required>
                            </div>
                        </div>
                        <?php
                        include '../conexao.php';

                        $sql_dias_semana = "select * from dias_semana;";

                        $retorno_dias_semana = mysqli_query($conexao, $sql_dias_semana);
                        ?>

                        <script>
                            function showUser(id) {
                                if (id === "") {
                                    document.getElementById("txtHint" + id).innerHTML = "";
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
                                            document.getElementById("txtHint" + id).innerHTML = this.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET", "ajax_aulas.php?id=" + id, true);
                                    xmlhttp.send();
                                }
                            }
                        </script>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="dias_semana" id="dias_semana">Restrições:</label>
                            <div class="col-sm-4">
                                <?php
                                while ($linha_dias_semana = mysqli_fetch_array($retorno_dias_semana)) {
                                    ?>

                                    <br>
                                    <input onchange="showUser(this.value)" type="checkbox" id="dias_semana" name="dias_semana[]" value="<?= $linha_dias_semana['id'] ?>"><?= $linha_dias_semana['dias_semana'] ?>
                                    <br>
                                    <div id="txtHint<?= $linha_dias_semana['id'] ?>"></div>
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

                    <br>
                    <br>

                    <?php
                    include './listar.php';
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
