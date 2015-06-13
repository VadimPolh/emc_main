@foreach ($practicals as $practical)

    <tr>
        <td class="text-primary"><strong>{{ $practical->title}}</strong></td>
        <td>{{ $practical->slug }}</td>
        <td>{{ $practical->objects->name}}</td>
        <td>{!! link_to_route('practical.show', trans('back/practical.see'), [$practical->id], ['class' => 'btn btn-success btn-block btn']) !!}</td>
        <td>{!! link_to_route('practical.edit', trans('back/practical.edit'), [$practical->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
        <td>
            {!! Form::open(['method' => 'DELETE', 'route' => ['practical.destroy', $practical->id]]) !!}
            {!! Form::destroy(trans('back/practical.destroy'), trans('back/practical.destroy-warning')) !!}
            {!! Form::close() !!}
        </td>

    </tr>
@endforeach