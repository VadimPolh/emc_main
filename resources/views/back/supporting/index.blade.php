@extends('back.template')


@section('main')

    @include('back.partials.entete', ['title' => trans('back/supporting.dashboard') . link_to_route('supporting.create', trans('back/supporting.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'user', 'fil' => trans('back/supporting.users')])

    @if(session()->has('ok'))
        @include('partials/error', ['type' => 'success', 'message' => session('ok')])
    @endif


@stop