@extends('back.template')


@section('main')

  @include('back.partials.entete', ['title' => trans('back/specialty.dashboard'), 'icone' => 'file', 'fil' => link_to('user', trans('back/specialty.dashboard')) . ' / ' . trans('back/specialty.creation')])

  <div class="col-sm-12">
		{!! Form::open(['url' => 'specialty', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
			{!! Form::control('text', 0, 'specialty_id', $errors, trans('back/specialty.specialty_id')) !!}
			{!! Form::control('text', 0, 'name', $errors, trans('back/specialty.name')) !!}
			{!! Form::control('text', 0, 'chief', $errors, trans('back/specialty.chief')) !!}
			{!! Form::submit(trans('back/specialty.send')) !!}
		{!! Form::close() !!}
	</div>




@stop