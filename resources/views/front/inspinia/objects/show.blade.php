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
                <a href="/{{$object -> specialty[0] -> slug}}">{{$object -> specialty[0] -> name}}</a>
            </li>
            <li class="active">
                <strong>{{$object -> name}}</strong>
            </li>
            <div class="pull-right">Преподователь: <strong>{{$object -> user -> username}}</strong></div>  
      </ol>
      
    </div>
</div>


    <div class="row animated fadeInRight">
<div class="col-lg-4 lection-list">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Лекции<span class="label label-warning-light" style="float: right;">{{count($object->lection)}}</span></h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-left"></i>
                </a>

            </div>
        </div>
        <div class="ibox-content">

            <div>
                <div class="feed-activity-list">
                    <?php $i = 1?>
                    @foreach($object->lection as $lection)


                            <div class="feed-element">
                        <a href="/{{$object -> specialty[0] -> slug}}/show/{{$object->slug}}/{{$lection->slug}}" class="pull-left">
                            <div class="randomize-box">{{$i}}</div>
                        </a>
                        <div class="media-body" style="  margin-top: 6px;">
                            <a href="/{{$object -> specialty[0] -> slug}}/show/{{$object->slug}}/{{$lection->slug}}">  <strong>{{$lection->title}}</strong></a>
                        </div>
                        </div>
                        <?php $i++;?>
                    @endforeach





                </div>

                <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Далее</button>

            </div>

        </div>
    </div>

</div>



<div class="col-lg-8 object-description">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="pull-right">
                                {{--<button class="btn btn-white btn-xs" type="button">Model</button>--}}
                                {{--<button class="btn btn-white btn-xs" type="button">Publishing</button>--}}
                                {{--<button class="btn btn-white btn-xs" type="button">Modern</button>--}}
                            </div>
                            <div class="text-center article-title">
                            
                                <h1>
                                    {{$object -> name}}
                                </h1>
                            </div>
                                {!!$object->description!!}
                            <hr>
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-8">
                                    <div class="small text-right">
                                        <h5>Cтатистика: <i class="fa fa-eye"> </i> 144 просмотров <i class="fa fa-comments-o"> </i> 0 пройденных тестов</h5>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


    </div>






@stop


@section('scripts')
   <script>

    var safeColors = ['00','33','66','99','cc','ff'];
    var rand = function() {
    return Math.floor(Math.random()*6);
    };
    var randomColor = function() {
    var r = safeColors[rand()];
    var g = safeColors[rand()];
    var b = safeColors[rand()];
    return "#"+r+g+b;
    };
    $(document).ready(function() {

    $('.randomize-box').each(function() {
    $(this).css('background',randomColor());
    });

    });
   </script>
@stop