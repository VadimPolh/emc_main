$(document).ready(function () {

   setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 5000
                };
                toastr.info('Удачного дня и успешного обучения!');

            }, 1300);  
  
  
  // MetsiMenu
    $('#side-menu').metisMenu();
  
   // minimalize menu
    $('.navbar-minimalize').click(function () {
        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();
    })
    
    
    function SmoothlyMenu() {
    if (!$('body').hasClass('mini-navbar') || $('body').hasClass('body-small')) {
        // Hide menu in order to smoothly turn on when maximize menu
        $('#side-menu').hide();
        // For smoothly turn on menu
        setTimeout(
            function () {
                $('#side-menu').fadeIn(500);
            }, 100);
    } else if ($('body').hasClass('fixed-sidebar')){
        $('#side-menu').hide();
        setTimeout(
            function () {
                $('#side-menu').fadeIn(500);
            }, 300);
    } else {
        // Remove all inline style from jquery fadeIn function to reset menu state
        $('#side-menu').removeAttr('style');
    }
}

//     function fix_height() {
//         var heightWithoutNavbar = $("body > #wrapper").height() - 61;
//         $(".sidebard-panel").css("min-height", heightWithoutNavbar + "px");
//     }
//     fix_height();
    
    
    
    
    $('.current-child').parent('ul').parent('li').addClass('active');
    $('.current-child').parent('ul').addClass('collapse in'); 
  
    
    
  
    
  
  
});