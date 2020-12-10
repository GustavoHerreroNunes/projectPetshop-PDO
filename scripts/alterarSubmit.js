function submitForm(){
    var action = document.funcionario.doAction.value;
    
    switch(action){
        case "true":
            document.funcionario.submit();
            break;
    }
}