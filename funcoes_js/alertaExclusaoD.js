function alertaExclusao(id){
    
    var identificador = id;
    var confirmar = confirm("Deseja realmete deletar?");
    
    if (confirmar === true){   
        window.location.href = "excluir.php?disciplinaID=" + identificador;
    }   
}


