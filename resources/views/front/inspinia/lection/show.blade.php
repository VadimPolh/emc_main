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
                    <a href="/{{$obj -> specialty[0] -> slug}}">{{$obj -> specialty[0] -> short_name}}</a>
                </li>
                <li>
                    <a href="/{{$obj -> slug}}">{{$obj -> name}}</a>
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
                    <span class="font-noraml">Тема: </span>
                    <span class="pull-right font-noraml">10:15AM 02 FEB 2014</span>
                </h5>
            </div>
        </div>
        <div class="mail-box">


            <div class="mail-body">
               {!! $lection -> summary !!}
            </div>
            <div class="mail-attachment">
                <p>
                    <span><i class="fa fa-paperclip"></i> 2 вложения - </span>
                    <a href="#">Скачать все</a>
                    |
                    <a href="#">Просмотреть картинка</a>
                </p>

                <div class="attachment">
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="icon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <div class="file-name">
                                    Document_2014.doc
                                    <br>
                                    <small>Добавлен: Jan 11, 2014</small>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="http://webapplayers.com/inspinia_admin-v1.9.2/img/p1.jpg">
                                </div>
                                <div class="file-name">
                                    Italy street.jpg
                                    <br>
                                    <small>Добавлен: Jan 6, 2014</small>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="http://webapplayers.com/inspinia_admin-v1.9.2/img/p2.jpg">
                                </div>
                                <div class="file-name">
                                    My feel.png
                                    <br>
                                    <small>Добавлен: Jan 7, 2014</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>


        </div>
    </div>
</div>

@stop