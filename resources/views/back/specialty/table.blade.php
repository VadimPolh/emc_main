	@foreach ($specialty as $item)
		<tr>
			<td class="text-primary"><strong>{{ $item->specialty_id }}</strong></td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->chief }}<td>
			<td>{!! link_to_route('specialty.edit', trans('back/users.edit'), [$item->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
      <td>
				{!! Form::open(['method' => 'DELETE', 'route' => ['specialty.destroy', $item->id]]) !!}
				{!! Form::destroy(trans('back/users.destroy'), trans('back/users.destroy-warning')) !!}
				{!! Form::close() !!}
			</td>
		</tr>
	@endforeach