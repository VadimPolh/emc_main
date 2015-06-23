@extends('back.template')

@section('main')

@include('back.partials.entete', ['title' => trans('back/group.dashboard') . link_to_route('groups.create', trans('back/group.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'user', 'fil' => trans('back/group.users')])


<div id="tri" class="btn-group btn-group-sm">
    <a href="#" type="button" name="total" class="btn btn-default active">{{ trans('back/group.all') }} <span class="badge">{{  $counts['total'] }}</span></a>
    @foreach($specialty as $spec)
        <a href="#" type="button" name="{!! $spec->slug !!}" class="btn btn-default">{{ $spec->short_name}} <span class="badge"></span></a>
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
            <th>{{ trans('back/group.name') }}</th>
            <th>{{ trans('back/group.mentor') }}</th>
            <th>{{ trans('back/group.specialty') }}</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @include('back.groups.table')
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
                    url: 'groups/sort/' + $(this).attr('name'),
                    type: 'GET',
                    dataType: 'json'
                })
                        .done(function(data) {
                            $('tbody').html(data.view);
                            $('.link').html(data.links);
                            $('#tempo').remove();
                        })
                        .fail(function() {
                            alert('{{ trans('back/group.fail') }}');
                        });
            });


        });

    </script>

@stop
