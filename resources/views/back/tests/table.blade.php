@foreach ($tests as $test)
<tr>
    <td>{{$test['name']}}</td>
    <td>{{$test->objects->name}}</td>
    @if ($test->locked == 0)
    <td><a href="#" class="unlockTest">Разблокировать <i class="fa fa-unlock"></i></a></td>
    @else
    <td><a href="#" class="lockTest">Заблокировать <i class="fa fa-lock"></i></a></td>
    @endif
    <td>{!! link_to_route('tests.show', trans('back/practical.see'), [$test->id], ['class' => 'btn btn-success btn-block btn']) !!}</td>
    <td>{!! link_to_route('tests.edit', trans('back/practical.edit'), [$test->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
    <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['tests.destroy', $test->id]]) !!}
        {!! Form::destroy(trans('back/practical.destroy'), trans('back/tests.destroy-warning')) !!}
        {!! Form::close() !!}
    </td>
</tr>

@endforeach