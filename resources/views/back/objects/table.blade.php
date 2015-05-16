	@foreach ($objects as $object)
  <tr>
  <td class="text-primary"><strong>{{ $object->name }}</strong></td>
  <td>{{ $object->slug }}</td>  
  <td>{{ $object->specialty[0]->name}}</td>
  <td>{!! link_to_route('objects.show', trans('back/objects.see'), [$object->id], ['class' => 'btn btn-success btn-block btn']) !!}</td>
      <td>{!! link_to_route('objects.edit', trans('back/objects.edit'), [$object->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
			<td>
				{!! Form::open(['method' => 'DELETE', 'route' => ['objects.destroy', $object->id]]) !!}
				{!! Form::destroy(trans('back/objects.destroy'), trans('back/objects.destroy-warning')) !!}
				{!! Form::close() !!}
			</td>
  </tr>
  @endforeach