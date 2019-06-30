jQuery(document).ready(function ($) {
    $('.site-header .menu-principal .menu').slicknav({
        label: '',
        appendTo: '.site-header'
    });


    $('.listado-testimoniales').bxSlider({
        auto: true,
        mode: 'fade',
        controls: false
    });
    window.onscroll = () => {
        const scroll = window.scrollY;
        var headerNav = $('.barra-navegacion');
        var documentBody = $('body');
        if (scroll > 300) {
            headerNav.addClass('fixed-top');
            documentBody.addClass('ft-activo');
        } else {
            headerNav.removeClass('fixed-top');
            documentBody.removeClass('ft-activo');
        }
    }


});

