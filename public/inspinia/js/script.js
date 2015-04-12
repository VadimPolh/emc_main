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
    
    
    
    
  
    
  
  
});