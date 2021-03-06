@extends('back.template')

@section('head')

<style type="text/css">
  
  .badge {
    padding: 1px 8px 1px;
    background-color: #aaa !important;
  }

</style>

@stop

@section('main')

  @include('back.partials.entete', ['title' => trans('back/users.dashboard') . link_to_route('user.create', trans('back/users.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'user', 'fil' => trans('back/users.users')])
 
  <div id="tri" class="btn-group btn-group-sm">
    <a href="#" type="button" name="total" class="btn btn-default active">{{ trans('back/users.all') }} <span class="badge">{{  $counts['total'] }}</span></a>
    @foreach ($roles as $role)
      <a href="#" type="button" name="{!! $role->slug !!}" class="btn btn-default">{{ $role->title }} <span class="badge">{{ $counts[$role->slug] }}</span></a>
    @endforeach
  </div>

	@if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif

  <div class="pull-right link">{!! $links !!}</div>

	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>{{ trans('back/specialty.name') }}</th>
					<th>{{ trans('back/users.role') }}</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			  @include('back.users.table')
      </tbody>
		</table>
	</div>

	<div class="pull-right link">{!! $links !!}</div>

@stop

@section('scripts')

  <script>
    
    $(function() {

      // Sorting gestion
      $('#tri').find('a').click(function(e) {
        e.preventDefault();
        // Wait icon
        $('.breadcrumb li').append('<span id="tempo" class="fa fa-refresh fa-spin"></span>');  
        // Buttons aspect
        $('#tri').find('a').removeClass('active');
        // Send ajax
        $.ajax({
          url: 'user/sort/' + $(this).attr('name'),
          type: 'GET',
          dataType: 'json'
        })
        .done(function(data) {
          $('tbody').html(data.view);
          $('.link').html(data.links);
          $('#tempo').remove();
        })
        .fail(function() {
          alert('{{ trans('back/users.fail') }}');
        });        
      });

    });

  </script>

@stop