@extends('back.template')


@section('main')

    @include('back.partials.entete', ['title' => trans('back/objects.dashboard'), 'icone' => 'file', 'fil' => link_to('specialty', trans('back/objects.dashboard')) . ' / ' . trans('back/objects.creation')])
  





@stop