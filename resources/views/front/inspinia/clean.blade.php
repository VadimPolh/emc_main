<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ trans('front/site.title') }}</title>
	<meta name="_token" content="{!! csrf_token() !!}"/>
{!! HTML::style('inspinia/css/bootstrap.min.css') !!}
{!! HTML::style('inspinia/font-awesome/css/font-awesome.css') !!}
{!! HTML::style('inspinia/css/animate.css') !!}
{!! HTML::style('inspinia/css/style.css') !!}


<!-- PLUGINS -->
{!! HTML::style('inspinia/css/plugins/iCheck/custom.css') !!}

@yield('head')

</head>

<body class="@yield('body-id', '')">
@yield('main')




{!! HTML::script('inspinia/js/jquery-2.1.1.js') !!}
{!! HTML::script('inspinia/js/bootstrap.min.js') !!}
{!! HTML::script('inspinia/js/plugins/iCheck/icheck.min.js') !!}

@yield('scripts')
<script type="text/javascript">
		$(document).ready(function () {
			$('.i-checks').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
			});
		});
</script>
</body>
</html>