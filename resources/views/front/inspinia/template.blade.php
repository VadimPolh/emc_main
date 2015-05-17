<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ trans('front/site.title') }}</title>
{!! HTML::style('inspinia/css/bootstrap.min.css') !!}
{!! HTML::style('inspinia/font-awesome/css/font-awesome.css') !!}
{!! HTML::style('inspinia/css/animate.css') !!}
{!! HTML::style('inspinia/css/style.css') !!}
{!! HTML::style('inspinia/css/plugins/toastr/toastr.min.css') !!}


<!-- PLUGINS -->
{!! HTML::style('inspinia/css/plugins/iCheck/custom.css') !!}

@yield('head')

</head>

<body class="@yield('body-id', '')">
<div id="wrapper">
  @include('front.inspinia.partial.menu')
  <div id="page-wrapper" class="gray-bg dashbard-1">
    @include('front.inspinia.partial.topBar')
    @yield('main')
  


   <div class="footer">
            <div class="pull-right">
                249GB из <strong>250GB</strong> Доступно.
            </div>
            <div>
                <strong>Колледж Бизнесса и Права</strong> Полх Вадим © 2014-2015
            </div>
        </div>
  </div>
{!! HTML::script('inspinia/js/jquery-2.1.1.js') !!}
{!! HTML::script('inspinia/js/bootstrap.min.js') !!}
{!! HTML::script('inspinia/js/plugins/iCheck/icheck.min.js') !!}
{!! HTML::script('inspinia/js/script.js') !!}
{!! HTML::script('inspinia/js/plugins/pace/pace.min.js') !!}
{!! HTML::script('inspinia/js/plugins/toastr/toastr.min.js') !!}
{!! HTML::script('inspinia/js/plugins/metis-menu/jquery.metisMenu.js') !!}

@yield('scripts')

<script type="text/javascript">
		$(document).ready(function () {
			$('.i-checks').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
			});
		});
</script>

  </div>
  </body>
</html>