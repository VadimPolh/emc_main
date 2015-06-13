@extends('back.template')

@section('main')

    @include('back.partials.entete', ['title' => trans('back/specializations.dashboard') . link_to_route('specializations.create', trans('back/specializations.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'file', 'fil' => trans('back/admin.specializations')])



    @if(session()->has('ok'))
        @include('partials/error', ['type' => 'success', 'message' => session('ok')])
    @endif


@stop