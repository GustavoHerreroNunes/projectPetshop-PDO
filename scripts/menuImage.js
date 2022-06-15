/*Imagens para os menus*/
var images = [

    //Cadastrar
    ["./assets/img/icons/menu/gray/cadastrar.png",
     "./assets/img/icons/menu/white/cadastrar.png"],
     
    //Excluir
    ["./assets/img/icons/menu/gray/excluir.png",
     "./assets/img/icons/menu/white/excluir.png"],

     //Buscar
     ["./assets/img/icons/menu/gray/buscar.png",
     "./assets/img/icons/menu/white/buscar.png"],

     //Alterar
     ["./assets/img/icons/menu/gray/alterar.png",
     "./assets/img/icons/menu/white/alterar.png"],

     //Listar
     ["./assets/img/icons/menu/gray/listar.png",
     "./assets/img/icons/menu/white/listar.png"],
];

function changeImage(icon, image){
    document.getElementsByClassName("icon")[icon].src = images[icon][image];
}