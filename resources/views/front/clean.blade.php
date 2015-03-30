<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->


<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{ trans('front/site.title') }}</title>
		<meta name="description" content="">	
		<meta name="viewport" content="width=device-width, initial-scale=1">
      {!! HTML::style('css/bootstrap.css') !!}
		  {!! HTML::style('css/add.css') !!}
  @yield('head')
  
</head>

<body>

	<!--[if lt IE 8]>
		<p class="browserupgrade">Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  
  	@if(session()->has('ok'))
			@include('partials/error', ['type' => 'success', 'message' => session('ok')])
		@endif	
		@if(isset($info))
			@include('partials/error', ['type' => 'info', 'message' => $info])
		@endif
		@yield('main')
  
  

		
	{!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
{!! HTML::script('js/plugins.js') !!}



	@yield('scripts')

  </body>
</html>