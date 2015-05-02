@extends('front.inspinia.template')

@section('main')



<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>{{$object -> name}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Главная</a>
            </li>
            <li>
                <a href="/">{{$object -> specialty[0] -> name}}</a>
            </li>
            <li class="active">
                <strong>{{$object -> name}}</strong>
            </li>
            <div class="pull-right">Преподователь: <strong>{{$object -> user -> username}}</strong></div>  
      </ol>
      
    </div>
</div>



<div class="sidebard-panel" style="">
                <div>
                    <h4>Лекции <span class="badge badge-info pull-right">0</span></h4>
<!--                     <div class="feed-element">
                        <a href="#" class="pull-left">
                            <img alt="image" class="img-circle" src="img/a1.jpg">
                        </a>
                        <div class="media-body">
                            There are many variations of passages of Lorem Ipsum available.
                            <br>
                            <small class="text-muted">Today 4:21 pm</small>
                        </div>
                    </div> -->
                    
                    
                </div>
                <div class="m-t-md">
                    <h4>Статистика</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                    </p>
                    <div class="row m-t-sm">
                        <div class="col-md-6">
                            <span class="bar" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><rect fill="#1ab394" x="0" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="3.3" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="6.6" y="0" width="2.3" height="16"></rect><rect fill="#d7d7d7" x="9.899999999999999" y="5.333333333333334" width="2.3" height="10.666666666666666"></rect><rect fill="#1ab394" x="13.2" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="16.5" y="0" width="2.3" height="16"></rect><rect fill="#1ab394" x="19.799999999999997" y="3.555555555555557" width="2.3" height="12.444444444444443"></rect><rect fill="#d7d7d7" x="23.099999999999998" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="26.4" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="29.7" y="12.444444444444445" width="2.3" height="3.5555555555555554"></rect></svg>
                            <h5><strong>0</strong> Сообщ.</h5>
                        </div>
                        <div class="col-md-6">
                            <span class="line" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><polygon fill="#1ab394" points="0 15 0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666 32 15"></polygon><polyline fill="transparent" points="0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline></svg>
                            <h5><strong>0</strong> Решений</h5>
                        </div>
                    </div>
                </div>
                <div class="m-t-md">
                    <h4>Вопросы</h4>
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge badge-primary">0</span>
                                 Общие вопросы
                            </li>
                            <li class="list-group-item ">
                                <span class="badge badge-info">0</span>
                                Вопросы по лабораторным
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-warning">0</span>
                                Иная информация
                            </li>
                        </ul>
                    </div>
                </div>
            </div>










<div class="col-lg-10 col-lg-offset-2" style="width:86.333333%;">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="pull-right">
                                <button class="btn btn-white btn-xs" type="button">Model</button>
                                <button class="btn btn-white btn-xs" type="button">Publishing</button>
                                <button class="btn btn-white btn-xs" type="button">Modern</button>
                            </div>
                            <div class="text-center article-title">
                            
                                <h1>
                                    Behind the word mountains
                                </h1>
                            </div>
                            <p>
                                Many desktop publishing packages and web page editors now use <strong>Lorem Ipsum as their default model text</strong>, and a search for 'lorem ipsum' will uncover many web
                            </p>
                            <p>
                                One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought. It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops
                            </p>
                            <p>
                                <i>
                                Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
                                </i>
                            </p>
                            <p>
                                The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek,
                            </p>
                            <p>
                                Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch "Jeopardy!", Alex Trebek's fun TV quiz game. Woven silk pyjamas exchanged for blue quartz. Brawny gods just
                            </p>
                            <p>
                                Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex.
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                        <h5>Тэги:</h5>
                                        <button class="btn btn-primary btn-xs" type="button">Model</button>
                                        <button class="btn btn-white btn-xs" type="button">Publishing</button>
                                </div>
                                <div class="col-md-6">
                                    <div class="small text-right">
                                        <h5>Cтатистика:</h5>
                                        <div> <i class="fa fa-comments-o"> </i> 0 комментариев </div>
                                        <i class="fa fa-eye"> </i> 144 просмотров
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>









@stop