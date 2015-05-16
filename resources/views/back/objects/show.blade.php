@extends('back.template')

@section('main')

    @include('back.partials.entete', ['title' => trans('back/objects.dashboard') . link_to_route('objects.create', trans('back/objects.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'file', 'fil' => trans('back/admin.objects')])

    <p>Название : {{ $object->name}}</p>
    <p>Преподователь: {{$object->user->username}}</p>

    <h3>Список лекций</h3>
    <?php $i=1 ?>
    @foreach ($object->lection as $lection)
    <p>{{$i}}. <a href="/lection/{{$lection->id}}">{{$lection->title}}</a></p>
    <?php $i++ ?>
    @endforeach

@stop