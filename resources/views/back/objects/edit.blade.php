@extends('back.template')

@section('main')


@include('back.partials.entete', ['title' => trans('back/objects.dashboard'), 'icone' => 'user', 'fil' => link_to('objects', trans('back/objects.Users')) . ' / ' . trans('back/objects.edition')])



<div class="col-sm-12">
		{!! Form::model($object, ['route' => ['objects.update', $object->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
    {!! Form::control('text', 0, 'name', $errors, trans('back/objects.name')) !!}
  	{!! Form::selection('specialty_id', $select, null, trans('back/objects.specialty')) !!}
    {!! Form::selection('user_id', $select_user, null, trans('back/objects.user')) !!}
		
  {!! Form::submit(trans('front/form.send')) !!}
  {!! Form::close() !!}
	</div>


@stop