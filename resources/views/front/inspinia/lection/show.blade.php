@extends('front.inspinia.template')

@section('main')



    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>{{$lection -> title}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Главная</a>
                </li>
                <li>
                    <a href="/umc/public/{{$obj -> specialty[0] -> slug}}">{{$obj -> specialty[0] -> short_name}}</a>
                </li>
                <li>
                    <?php $group = DB::table('groups')->where('id', $user->groups_id)->pluck('slug')?>
                    <a href="/umc/public/{{$obj -> specialty[0] -> slug}}/{{$group}}/{{$obj -> slug}}">{{$obj -> name}}</a>
                </li>
                <li class="active">
                    <strong>{{$lection -> title}}</strong>
                </li>
                <div class="pull-right">Преподователь: <strong>{{$obj -> user -> username}}</strong></div>
            </ol>

        </div>
    </div>

    <div class="row animated fadeInRight">
    <br>
    <div class="col-lg-12 animated fadeInRight">
        <div class="mail-box-header">
            <div class="pull-right tooltip-demo">
                <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Распечатать лекцию"><i class="fa fa-print"></i> </a>
                <a href="" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="В избранное"><i class="fa fa-star"></i> </a>
            </div>
            <h2>
                Просмотр лекции
            </h2>
            <div class="mail-tools tooltip-demo m-t-md">

                <h5>
                    <span class="font-noraml">Тема: <strong>{{$lection->topic->name}}</strong></span>
                    <span class="pull-right font-noraml">{{$lection->updated_at}}</span>
                </h5>
            </div>
        </div>
        <div class="mail-box">


            <div class="mail-body">
               {!! $lection -> summary !!}
            </div>
           @if (count($lection->attachment) != 0)
            <div class="mail-attachment">
                <p>
                    <span><i class="fa fa-paperclip"></i> {{count($lection->attachment)}} вложения - </span>
                    <a href="#">Скачать все</a>
                    |
                    <a href="#">Просмотреть картинки</a>
                </p>
                @foreach($lection->attachment as $attachment)
                    <div class="attachment">
                        <div class="file-box">
                            <div class="file">
                                <a href="/attachment/lection/{{$lection->id}}/{{$attachment->name}}">
                                    <span class="corner"></span>
                                    @if(str_contains($attachment->name,'.jpg'))
                                        <div class="image">
                                          <img alt="image" class="img-responsive" src="/attachment/lection/{{$lection->id}}/{{$attachment->name}}">
                                        </div>
                                    @else
                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                    @endif
                                    <div class="file-name">
                                        {{$attachment->name}}
                                        <br>
                                        <small>Добавлен: {{ date('F d, Y', strtotime($attachment->created_at)) }}</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach





                    <div class="clearfix"></div>

            </div>
            @endif

            @if(count($lection->practicals) != 0)
                <div class="mail-body tooltip-demo">
                    <h4>Практические к данной лекции</h4>
                    <ul>
                    @foreach($lection->practicals as $practical)
                    <?php $i =1?>
                        <li><a href="/umc/public/">{{$i}}.{{$practical->title}}</a></li>
                    <?php $i++?>
                    @endforeach
                    </ul>
                </div>
            @endif




            <div class="clearfix"></div>

        </div>
    </div>
</div>
<br><br>
@stop