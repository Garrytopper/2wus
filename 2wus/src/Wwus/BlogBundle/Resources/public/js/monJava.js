$(function() {
    // Code exécuté avant même que la page soit chargée je redimensionne les div
    // de la page d'accueil
    // En premier le redimenssionnement de mes sections en fonction de la taille de l'écran
    var X = $(window).width();
    var Y = $(window).height();
    $('#section1, #section2, #section3').css('height', Y).css('width', '100%');
    // Ensuite je redimensionne le contenu de la section1: "contenu"  
    var YpiedPage = $('.pied-de-page').height();
    var YenTete = $('.en-tete').height();
    var Ycontenu = Y - YpiedPage - YenTete ;
    $('.contenu').css('height', Ycontenu);
    
    // Ensuite je redimenssionne le contenu de la section1 
        var Ydescription = $('#description_accueil').height();
        var Ylogo = $('#logo_accueil').height();
        // #tampon_accueil s'adaptera en fonction du contenu de #description_accueil définit en css
        // le - 4 c'est pour palier une différence que je présume du à la séparation en 2 row
        var Ytampon = Ycontenu - Ydescription - Ylogo - 4;
        $('#tampon_accueil').css('height', Ytampon);
    
    // Ensuite je redimenssionne le contenu de la section2
    var Ycarroussel = Ycontenu * 0.7 ;
    var Yliste = Ycontenu * 0.3 ;
    $('#carroussel').css('height', Ycarroussel);
    $('#liste_article').css('height', Yliste);

    
    //***************************************** TEST
    //alert('contenu : '+ Ycontenu +' dont en-tête : '+ YenTete +', et le pied-de-page : '+ YpiedPage);
    //alert('contenu : '+ Ycontenu +', + scroll : '+ Yscroll +' devrait faire : ' + Y);
});