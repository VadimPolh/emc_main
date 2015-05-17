@extends('back.template')

@section('main')


  @include('back.partials.entete', ['title' => trans('back/users.dashboard'), 'icone' => 'user', 'fil' => link_to('user', trans('back/users.Users')) . ' / ' . trans('back/users.creation')])

	<div class="col-sm-12">
		{!! Form::open(['url' => 'user', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
			{!! Form::control('text', 0, 'username', $errors, trans('back/users.name')) !!}
			{!! Form::control('email', 0, 'email', $errors, trans('back/users.email')) !!}
			{!! Form::control('password', 0, 'password', $errors, trans('back/users.password')) !!}
			{!! Form::control('password', 0, 'password_confirmation', $errors, trans('back/users.confirm-password')) !!}
			{!! Form::selection('role', $select, null, trans('back/users.role')) !!}
             <div class="group" style="display: none">{!! Form::selection('group_id', $group, null, trans('back/users.group')) !!}</div>
			{!! Form::submit(trans('front/form.send')) !!}
		{!! Form::close() !!}
	</div>

@stop

@section('scripts')
    <script>
    $('#role').on('change', function() {
    if (this.value == 3){
        $('.group').show();
    }else{
        $('.group').hide();
    }
    });
    </script>
@stop