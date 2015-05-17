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





@stop