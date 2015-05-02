@extends('back.template')

@section('main')

@include('back.partials.entete', ['title' => trans('back/lection.dashboard') . link_to_route('lection.create', trans('back/lection.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'user', 'fil' => trans('back/lection.users')])


<div id="tri" class="btn-group btn-group-sm">
    <a href="#" type="button" name="total" class="btn btn-default active">{{ trans('back/lection.all') }} <span class="badge">{{  $counts['total'] }}</span></a>
</div>


   @if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif

@stop