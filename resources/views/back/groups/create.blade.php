@extends('back.template')


@section('main')

	@include('back.partials.entete', ['title' => trans('back/group.dashboard'), 'icone' => 'file', 'fil' => link_to('groups', trans('back/group.dashboard')) . ' / ' . trans('back/group.creation')])

	<div class="col-sm-12">

		{!! Form::open(['url' => 'groups', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
		{!! Form::control('text', 0, 'name', $errors, trans('back/group.name')) !!}
		{!! Form::selection('specialty_id', $specialty, null, trans('back/group.specialty')) !!}
		{!! Form::selection('user_id', $user, null, trans('back/group.mentor')) !!}

		{!! Form::submit(trans('front/form.send')) !!}
		{!! Form::close() !!}
	</div>




@stop

@section('scripts')



@stop