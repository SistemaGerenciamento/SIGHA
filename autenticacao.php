<?php

session_start();

function logar($username) {
    $_SESSION['nome'] = $username;
    iniciarTempoSessao();
}

function deslogar() {
    session_destroy();
}

function sessaoExpirada() {
    if ($_SESSION['tempo'] < time()) {
        return true;
    } else {
        // reiniciar sessao
        iniciarTempoSessao();
        return false;
    }
}

function autenticar() {
    //se NAO estaLogado ou sessaoExpirada
    if (!estaLogado() || sessaoExpirada()) {
        deslogar();
        header('Location: ../form_login.php');
    } else {
        return true;
    }
}

function estaLogado() {
    return isset($_SESSION['nome']);
}

function iniciarTempoSessao() {
    $_SESSION['tempo'] = time() + 3600;
}
