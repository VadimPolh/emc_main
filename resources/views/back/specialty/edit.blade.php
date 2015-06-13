@extends('back.template')

@section('main')

  @include('back.partials.entete', ['title' => trans('back/specialty.dashboard'), 'icone' => 'specialty', 'fil' => link_to('specialty', trans('back/specialty.all')) . ' / ' . trans('back/specialty.edition')])

	<div class="col-sm-12">
		{!! Form::model($specialty, ['route' => ['specialty.update', $specialty->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
		{!! Form::control('text', 0, 'specialty_id', $errors, trans('back/specialty.specialty_id')) !!}
			{!! Form::control('text', 0, 'name', $errors, trans('back/specialty.name')) !!}
			{!! Form::control('text', 0, 'chief', $errors, trans('back/specialty.chief')) !!}
      {!! Form::control('text', 0, 'short_name', $errors, trans('back/specialty.short_name')) !!}
      {!! Form::control('text', 0, 'icon_class', $errors, trans('back/specialty.icon_class')) !!}
			{!! Form::submit(trans('front/form.send')) !!}
		{!! Form::close() !!}
	</div>

	<h3>Предметы</h3>
  	<?php $i=1 ?>
	@foreach($specialty->objects as $objects)
		<p>{{$i}}. <a href="/objects/{{$objects->id}}">{{$objects->name}}</a></p>
		<?php $i++ ?>
	@endforeach

@stop