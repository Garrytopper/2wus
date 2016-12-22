$(function() {
    // Code exécuté avant même que la page soit chargée
    var X = $(window).width();
    var Y = $(window).height();
    $('#section1, #section2, #section3').css('height', Y).css('width', '100%');
});