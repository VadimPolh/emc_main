@foreach ($lections as $lection)

    <tr>
        <td class="text-primary"><strong>{{ $lection->title}}</strong></td>
        <td>{{ $lection->slug }}</td>
        <td>{{ $lection->objects->name}}</td>
        <td>{!! link_to_route('lection.show', trans('back/objects.see'), [$lection->id], ['class' => 'btn btn-success btn-block btn']) !!}</td>
        <td>{!! link_to_route('lection.edit', trans('back/objects.edit'), [$lection->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
        <td>
            {!! Form::open(['method' => 'DELETE', 'route' => ['lection.destroy', $lection->id]]) !!}
            {!! Form::destroy(trans('back/lection.destroy'), trans('back/lection.destroy-warning')) !!}
            {!! Form::close() !!}
        </td>

    </tr>
@endforeach