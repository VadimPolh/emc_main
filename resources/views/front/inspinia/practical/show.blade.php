@extends('front.inspinia.template')

@section('main')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>{{$practical -> title}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Главная</a>
                </li>
                <li>
                    <a href="/{{$obj -> specialty[0] -> slug}}">{{$obj -> specialty[0] -> short_name}}</a>
                </li>
                <li>
                    <?php $group = DB::table('groups')->where('id', $user->groups_id)->pluck('slug')?>
                    <a href="/{{$obj -> specialty[0] -> slug}}/{{$group}}/{{$obj -> slug}}">{{$obj -> name}}</a>
                </li>
                <li class="active">
                    <strong>{{$practical -> title}}</strong>
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
                        <span class="font-noraml">Тема: <strong>{{$practical->topic->name}}</strong></span>
                        <span class="pull-right font-noraml">{{$practical->updated_at}}</span>
                    </h5>
                </div>
            </div>
            <div class="mail-box">


                <div class="mail-body">
                    {!! $practical -> summary !!}
                </div>






                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    <br><br>







@stop