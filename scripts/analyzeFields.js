function isCampFilled(scenario){
    var camps = true;
    var msg = "o campo";

    switch(scenario){
        case 1:
            camps = (document.funcionario.txbBusca.value != "");
            break;
        case 2:
            camps = ((document.funcionario.txbNome.value != "") &&
                    (document.funcionario.txbTipo.value != "") &&
                    (document.funcionario.txbRaca.value != "") &&
                    (document.funcionario.txbCorP.value != "") &&
                    (document.funcionario.txbNasc.value != "") &&
                    (document.funcionario.txbSexo.value != "")) == true;
            msg = "todos os campos";
            break;
    }

    if(!camps){
        alert("Preencha " + msg + " primeiro");
        document.funcionario.doAction.value = "false";
    }else{
        document.funcionario.doAction.value = "true";
    }

}