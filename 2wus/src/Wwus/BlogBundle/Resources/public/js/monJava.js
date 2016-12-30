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
    $('.menu').css('height', Y);
    
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


    // Java pour gérer le scroll de la page
    // Ici je souhaite que lorque l'utilisateur scroll vers le bas ou vers le haut, 
    // la page défile pour se placer correctement en haut d'une section
     
    // variable qui servira de repère de haut de section
    var lastScrollTop = 0;
    // variable qui enregistre la position du scroll précedent afin de déterminer en comparaison du scroll actuel : 
    // le mouvement descendant ou montant de l'utilisateur 
    var pastScroll = 0;
    $(window).scroll(function(event){
       var scroll = $(this).scrollTop();
       var mouv = scroll - pastScroll;
       if (mouv > 0) 
       { 
            if (scroll > lastScrollTop + Y/8 &&  scroll < lastScrollTop + Y/8 + 50) 
            {
                 lastScrollTop = lastScrollTop + Y;
                 $('html, body').animate({ scrollTop: lastScrollTop}, 'slow');
            };
       };
       if (mouv < 0)
       {
            if (scroll < lastScrollTop - Y/8 &&  scroll > lastScrollTop - Y/8 - 50) 
            {
                 lastScrollTop = lastScrollTop - Y;
                 $('html, body').animate({ scrollTop: lastScrollTop}, 'slow');
            };
       };
        pastScroll = scroll;
        // Maintenant je gère le stick du menu en fonction de la position du scroll 
        if (scroll >= Y + $('.en-tete').height())
        {
            $('#navigation').addClass('sticky');
        }   
        else
        {
            $('#navigation').removeClass('sticky');
        }   
    });

    // Java pour gérer le menu
    $('.hamburger').on('click', function(){
        if ($('.hamburger').hasClass('is-opened')) {
            $('.hamburger').removeClass('is-opened');
            $('.menu').fadeOut();
        }
        else{
            $('.hamburger').addClass('is-opened');

            $('.menu').fadeIn();
        }
    });
    
    //***************************************** TEST
    //alert('contenu : '+ Ycontenu +' dont en-tête : '+ YenTete +', et le pied-de-page : '+ YpiedPage);
    //alert('contenu : '+ Ycontenu +', + scroll : '+ Yscroll +' devrait faire : ' + Y);
});