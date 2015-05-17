@foreach ($groups as $group)
    <tr>
        <td class="text-primary"><strong>{{ $group->name}}</strong></td>
        <td>{{  DB::table('users')->where('id', $group->user_id)->pluck('username') }}</td>
        <td>{{$group->specialty->short_name}}</td>
        <td>{!! link_to_route('groups.show', trans('back/objects.see'), [$group->id], ['class' => 'btn btn-success btn-block btn']) !!}</td>
        <td>{!! link_to_route('groups.edit', trans('back/objects.edit'), [$group->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
        <td>
            {!! Form::open(['method' => 'DELETE', 'route' => ['groups.destroy', $group->id]]) !!}
            {!! Form::destroy(trans('back/group.destroy'), trans('back/group.destroy-warning')) !!}
            {!! Form::close() !!}
        </td>

    </tr>

@endforeach