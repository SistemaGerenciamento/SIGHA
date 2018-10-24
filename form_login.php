<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css_4.1/bootstrap.css">
        <?php
        include './autenticacao.php';
        include './conexao.php';

        ini_set("display_errors", true);
        ?>
    <h3 class="text-center"> Sistema de Gerenciamento de Horários Acadêmicos </h3>

    <br>

    <div class="conteiner">
        <div class="row col-sm-4 offset-4" >
            <form method="post" class="col-sm-12" action="#">            
                <div class="form-group">
                    <label for="usuaria">Usuária:</label>
                    <input type="text" class="form-control " id="username" required name="nome"/>
                </div>

                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" class="form-control " id="password" required name="senha"/>
                </div>

                <input type="submit" class="btn btn-success col-sm-4 offset-4" value="Entrar">
            </form>
        </div>
        <?php
        if (Count($_POST) > 0) {
            $username = $_POST['nome'];
            $password = $_POST['senha'];



            $sql = "select * from administradora where nome = '$username' and senha = '$password'";


            $retorno = mysqli_query($conexao, $sql);

            $resultado = mysqli_fetch_array($retorno);

            if ($resultado == null) {
                ?>

                <br>
                <div class="form-group alert alert-danger col-sm-4 offset-4" align="center" role="alert">
                    Usuária ou senha errado! 
                </div>
            </div>

            <?php
        } else {

            logar($resultado['nome']);

            echo 'Seja bem-vinda ' . $username;

            header('Location: index.php');
        }
    }
    ?>
</head>
<body>




</body>
</html>
