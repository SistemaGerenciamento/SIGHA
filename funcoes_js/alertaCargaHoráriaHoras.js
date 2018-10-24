function alertaCargaHorariaHoras(carga_horaria_distribuir){
    
    var carga_horaria = carga_horaria_distribuir;
    
    if (carga_horaria < 0){
    alert("Precisa de mais: " + carga_horaria * (-1) + "h!");
    } else if (carga_horaria > 0) {
        alert("Aumente o calendário para completar a distribuição!");
    } else{
        alert("Carga horária distribuída com sucesso!");
    }

}


