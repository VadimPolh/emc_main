@extends('back.template')

@section('main')

    @include('back.partials.entete', ['title' => trans('back/practical.dashboard') . link_to_route('practical.create', trans('back/practical.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'user', 'fil' => trans('back/practical.users')])


    @if(session()->has('ok'))
        @include('partials/error', ['type' => 'success', 'message' => session('ok')])
    @endif

    <div class="pull-right link">{!! $links !!}</div>


    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>{{ trans('back/practical.name') }}</th>
                <th>{{ trans('back/practical.slug') }}</th>
                <th>{{ trans('back/practical.nameobjects') }}</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @include('back.practical.table')
            </tbody>
        </table>
    </div>





    <div class="pull-right link">{!! $links !!}</div>



@stop