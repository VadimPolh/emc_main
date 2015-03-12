@extends('front.clean')

@section('main')

				
      @if(session()->has('error'))
					@include('partials/error', ['type' => 'danger', 'message' => session('error')])
				@endif	
				
    
				<h2>{{ trans('front/login.connection') }}</h2>
	       <p>{{ trans('front/login.text') }}</p>				
				
				{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']) !!}	
				
			

					{!! Form::control('text', 6, 'log', $errors, trans('front/login.log')) !!}
					{!! Form::control('password', 6, 'password', $errors, trans('front/login.password')) !!}
					{!! Form::submit(trans('front/form.login'), ['col-lg-12']) !!}
					{!! Form::check('memory', trans('front/login.remind')) !!}
{{--Не понятное для меня поле--}}					
{{-- Form::text('address', '', ['class' => 'hpet']) --}}		  

{!! link_to('password/email', trans('front/login.forget')) !!}
		{!! link_to('auth/register', trans('front/login.registering'), ['class' => 'btn btn-default']) !!}
				
				{!! Form::close() !!}

			
						
					

@stop

