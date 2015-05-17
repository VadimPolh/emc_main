$(document).ready(function () {

  // MetsiMenu
    $('#side-menu').metisMenu();
  
   // minimalize menu
    $('.navbar-minimalize').click(function () {
        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();
    })



    $('.collapse-link').click( function() {
        var ibox = $(this).closest('div.ibox');
        var button = $(this).find('i');
        var content = ibox.find('div.ibox-content');
        var contentBox = $('div.lection-list');
        button.toggleClass('fa-chevron-left').toggleClass('fa-chevron-right');
        content.slideToggle(200);
        contentBox.toggleClass('col-lg-1').toggleClass('col-lg-4');

        $('.lection-list h5').toggleClass('dn');
        $('.lection-list').toggleClass('slimll');

        $('.object-description').toggleClass('col-lg-11').toggleClass('col-lg-8');
        $('.object-description').toggleClass('bigblock');


        setTimeout(function () {
            ibox.resize();
            ibox.find('[id^=map-]').resize();
        }, 50);
    });


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

var timer;
//ajax search

function up(){

    timer = setTimeout(function(){

        var keywords = $('#top-search').val();




        if (keywords.length > 0){
            $('.search-title').html('Поиск по запросу <span class="text-navy">“'+ keywords +'”</span>');
            $.post("/search",{keywords: keywords, _token: $('meta[name=_token]').attr('content')},function(markup){

                $('.search-inner').html(markup);

            });
        }else{
            $('.searchbox').hide();
            $('.search-inner').html('<h2 class="search-title">Введите поисковый запрос...</h2>');
        }


    },500);
}

function down(){
    $('.searchbox').show();

}