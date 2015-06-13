@extends('back.template')

@section('main')

    @include('back.partials.entete', ['title' => trans('back/test.dashboard') . link_to_route('tests.create', trans('back/test.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'user', 'fil' => trans('back/test.users')])

    @if(session()->has('ok'))
        @include('partials/error', ['type' => 'success', 'message' => session('ok')])
    @endif


    <div class="pull-right link">{!! $links !!}</div>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>{{ trans('back/tests.name') }}</th>
                <th>{{ trans('back/tests.slug') }}</th>
                <th>{{ trans('back/tests.nameobjects') }}</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @include('back.tests.table')
            </tbody>
        </table>
    </div>



    <div class="pull-right link">{!! $links !!}</div>



@stop
