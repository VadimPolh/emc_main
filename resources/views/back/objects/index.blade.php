@extends('back.template')

@section('main')

@include('back.partials.entete', ['title' => trans('back/objects.dashboard') . link_to_route('objects.create', trans('back/objects.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'user', 'fil' => trans('back/objects.users')])
 

<div id="tri" class="btn-group btn-group-sm">
    <a href="#" type="button" name="total" class="btn btn-default active">{{ trans('back/objects.all') }} <span class="badge">{{  $counts['total'] }}</span></a>
</div>
  
  @if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif

  <div class="pull-right link">{!! $links !!}</div>
  
  
  <div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>{{ trans('back/objects.name') }}</th>
					<th>{{ trans('back/objects.slug') }}</th>
					<th>{{ trans('back/specialty.nameobjects') }}</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			  @include('back.objects.table')
      </tbody>
		</table>
	</div>
  
  
  
  
  
  <div class="pull-right link">{!! $links !!}</div>
  
  
  
@stop