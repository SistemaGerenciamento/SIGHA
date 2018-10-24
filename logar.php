<?php
include './autenticacao.php';
include './conexao.php';

ini_set("display_errors", true);


$username = $_POST['nome'];
$password = $_POST['senha'];



$sql = "select * from administradora where nome = '$username' and senha = '$password'";


$retorno = mysqli_query($conexao,$sql);

$resultado = mysqli_fetch_array($retorno);

if ($resultado == null){
    
    echo "Usuario ou senha incorreto. Tente novamente.";
    
    ?>

    <br>
    <br>
    
    <?php
    
    echo '<a href="form_login.php"> Entrar no SIGHA </a>';
    
} else {
    
    logar($resultado['nome']);
       
    echo 'Seja bem-vinda ' . $username;
    
    header('Location: index.php');
}



