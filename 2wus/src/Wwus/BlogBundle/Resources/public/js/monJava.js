$(function() {
    $("#section1").on("click",function(){
        var X_ecran = document.documentElement.clientWidth;
        var Y_ecran = document.documentElement.clientHeight;
        var element = document.activeElement;
        alert('La largeur de l\'écran est de ' + X_ecran + ' et sa hauteur est de ' + Y_ecran + ' et l\'élément courant est : ' + element);
    }); 
});