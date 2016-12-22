$(function() {
    // Code exécuté avant même que la page soit chargée je redimensionne les div
    // de la page d'accueil
    // En premier le redimenssionnement de mes sections en fonction de la taille de l'écran
    var X = $(window).width();
    var Y = $(window).height();
    $('#section1, #section2, #section3').css('height', Y).css('width', '100%');
    // Ensuite je redimensionne le contenu de la section1: "contenu" et "scroll" (scroll est définit en css)
    var Yscroll = $('.scroll').height() ;
    var Ycontenu = Y - Yscroll ;
    $('.contenu').css('height', Ycontenu);
    // Ensuite je redimenssionne le contenu de "contenu" (logo est définit en css)
    var Ydescription = $('#description_accueil').height();
    var Ylogo = $('#logo_accueil').height();
    // #tampon_accueil s'adaptera en fonction du contenu de #description_accueil définit en css
    // le - 4 c'est pour palier une différence que je présume du à la séparation en 2 row
    var Ytampon = Ycontenu - Ydescription - Ylogo - 4;
    $('#tampon_accueil').css('height', Ytampon);

    //***************************************** TEST
    //alert('contenu : '+ Ycontenu +' dont logo : '+ Ylogo +', tampon : '+ Ytampon +', description : '+ Ydescription);
    //alert('contenu : '+ Ycontenu +', + scroll : '+ Yscroll +' devrait faire : ' + Y);
});