@extends('back.template')


@section('main')

    @include('back.partials.entete', ['title' => trans('back/objects.dashboard'), 'icone' => 'file', 'fil' => link_to('specialty', trans('back/objects.dashboard')) . ' / ' . trans('back/objects.creation')])
  
<div class="col-sm-12">
		{!! Form::open(['url' => 'objects', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
    {!! Form::control('text', 0, 'name', $errors, trans('back/objects.name')) !!}
  	{!! Form::selection('specialty_id', $select, null, trans('back/objects.specialty')) !!}
  
  
  
  
  	{!! Form::submit(trans('front/form.send')) !!}
		{!! Form::close() !!}
	</div>




@stop