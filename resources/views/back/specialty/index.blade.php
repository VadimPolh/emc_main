@extends('back.template')


@section('main')

  @include('back.partials.entete', ['title' => trans('back/specialty.dashboard') . link_to_route('specialty.create', trans('back/specialty.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'file', 'fil' => trans('back/admin.specialty')])

 <div id="tri" class="btn-group btn-group-sm">
    <a href="#" type="button" name="total" class="btn btn-default active">{{ trans('back/specialty.all') }} <span class="badge">{{$counts}}</span></a>
  </div>
  
  @if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif

  <div class="pull-right link">{!! $links !!}</div>


  <div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>{{ trans('back/specialty.specialty_id') }}</th>
					<th>{{ trans('back/specialty.name') }}</th>
					<th>{{ trans('back/specialty.chief') }}</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			  @include('back.specialty.table')
      </tbody>
		</table>
	</div>


  <div class="pull-right link">{!! $links !!}</div>


@stop