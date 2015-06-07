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






$('.about-profile').on('click',function(e){
    e.preventDefault();

    var html,image;

    $.get('/api/user/info', function(data) {
        console.log(data);

        image = $('.img-circle').attr('src');


    html = '<div class="modal inmodal fade in" id="myModal6" tabindex="-1" role="dialog" aria-hidden="false" style="display: block;">';
    html += '<div class=\"modal-dialog modal-sm\">';
    html += '                                <div class=\"modal-content\">';
    html += '                                    <div class="modal-header">';
    html += '                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
    html += '                                        <h4 class="modal-title">Информация</h4>';
    html += '                                    </div>';
    html += '                                    <div class="modal-body">';
    html += '                                      <img alt="image" class="img-responsive" src="'+ image +'">';
    html += '                                              <h4><strong>' + data.username + '</strong></h4>';
    html += ' <p>E-mail: '+ data.email +'</p>';
    html += ' <p>Роль: '+ data.role +'</p>';


        if (data.role == 'Учащийся'){
            html += '<p>Группа: '+ data.group +'</p>';
            html += '<p>Специальность:'+ data.specialty + '</p>';
            html += '<p>Специализация:</p>';
        }



    html += ' </div>';
    html += '                                    ';
    html += '                                    <div class="modal-footer">';
    html += '                                        <button type="button" class="btn btn-white" class="close" data-dismiss="modal">Закрыть</button>';
    html += '                                    </div>';
    html += '                                </div>';
    html += '                            </div>';
    html += '                        </div>';




    $('body').append(html);

    $('.close').on('click',function(){
        $('#myModal6').hide();
    });

    });




    


    

   



    
});


