@extends('front.clean')

@section('main')

	<div class="container-fluid">

		<div class="container-page">
      @if(session()->has('error'))
					@include('partials/error', ['type' => 'danger', 'message' => session('error')])
				@endif	
			<div class="row">	
      <div class="col-md-4 col-md-offset-2 margin-top-15">
    
				<h2>{{ trans('front/login.connection') }}</h2>
	      <p>{{ trans('front/login.text') }}</p>				
				
				{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']) !!}	
				
					{!! Form::control('text', 12, 'log', $errors, trans('front/login.log')) !!}
					{!! Form::control('password', 12, 'password', $errors, trans('front/login.password')) !!}
          {!! Form::check('memory', trans('front/login.remind')) !!}
          <br>
          {!! Form::submit(trans('front/form.login'), ['col-lg-12']) !!}
          
          {{--Не понятное для меня поле--}}					
          {{-- Form::text('address', '', ['class' => 'hpet']) --}}		  

          
		      {!! link_to('auth/register', trans('front/login.registering'), ['class' => 'btn btn-default']) !!}
				
				{!! Form::close() !!}
        
        
        
      </div>
        {!! link_to('password/email', trans('front/login.forget'), ['class' => 'password-forget']) !!}
      <div class="col-md-5 col-md-offset-1" id="bg">
        <div class="information-content margin-top-15">
        <h1 class="text-uppercase">Учебно-методический комплекс </h1>
        <h2>Колледж Бизнесса и Права</h2>
        <p>В Pascal можно организовать вызов из программы любой другой программы, которую назовем программой–потомком. Но, чтобы программа–потомок успешно загружалась в память и начала выполняться, требуется выделить ей необходимый объем памяти. Так как программа, которая выполняется в данный момент, по умолчанию захватывает всю свободную динамическую память (кучу) системы, то для загрузки программы–потомка просто нет места.</p>
        <p>
        <a href="http://kbp.by" target="_blank" class="btn btn-default">Оффициальный сайт колледжа</a>
        <a href="kbp.by" target="_blank" class="btn btn-default">Рассписание занятий</a>
        </p>
        
            <p class="text-muted image-footer">Портал работает под управлением "<a href="/" class="brand">
				<img src="http://laravel.com/assets/img/laravel-logo.png" height="20">
				Laravel
			</a>" 
              <a href="http://webdirection.by/" class="copyright">webdirection.by</a></p>
          
          
        </div>
        </div>
      </div>
		</div>

</div>

@stop

