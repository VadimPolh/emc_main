@extends('back.template')

@section('main')

    @include('back.partials.entete', ['title' => trans('back/lection.dashboard') . link_to_route('lection.create', trans('back/lection.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'file', 'fil' => trans('back/admin.lection')])

    <p>Название : {{ $lection->title}}</p>
    <p>Предмет: {{$lection->objects->name}}</p>

    <p>{!!$lection->summary!!}</p>




@stop