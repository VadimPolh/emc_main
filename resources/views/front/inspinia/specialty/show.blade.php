@extends('front.inspinia.template')



@section('main')


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>{{$spc -> name}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Главная</a>
                </li>
                <li class="active">
                    <strong>{{$spc -> name}}</strong>
                </li>
                <div class="pull-right">Зав. Отделением: <strong>{{$spc->chief}}</strong></div>
            </ol>

        </div>
    </div>

    <div class="row animated fadeInRight">
        <div class="col-lg-4 lection-list">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Группы</h5>
        <div class="ibox-tools">

        </div>
    </div>
    <div class="ibox-content no-padding">
        <ul class="list-group">

           @foreach($spc->groups as $group)

                <li class="list-group-item ">
                    <span class="badge badge-info">{{count($group->user)}}</span>
                    {{$group->name}}

                </li>

           @endforeach


        </ul>
    </div>
</div>
</div>


</div>
@stop