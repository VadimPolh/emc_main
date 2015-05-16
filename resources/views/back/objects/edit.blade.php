@extends('back.template')

@section('main')


@include('back.partials.entete', ['title' => trans('back/objects.dashboard'), 'icone' => 'user', 'fil' => link_to('objects', trans('back/objects.Users')) . ' / ' . trans('back/objects.edition')])



<div class="col-sm-12">
	{!! Form::model($object, ['route' => ['objects.update', $object->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
    {!! Form::control('text', 0, 'name', $errors, trans('back/objects.name')) !!}
  	{!! Form::selection('specialty_id', $select, null, trans('back/objects.specialty')) !!}
    {!! Form::selection('user_id', $select_user, null, trans('back/objects.user')) !!}
    {!! Form::control('textarea', 0, 'description', $errors, trans('back/objects.description')) !!}
		
  {!! Form::submit(trans('front/form.send')) !!}
  {!! Form::close() !!}
	</div>


@stop


@section('scripts')

    {!! HTML::script('ckeditor/ckeditor.js') !!}

    <script>

        var config = {
            codeSnippet_theme: 'kama',
            language: '{{ config('app.locale') }}',
            height: 600,
            filebrowserBrowseUrl: '{!! url($url) !!}',
            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                //'/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' }
            ]
        };

        CKEDITOR.replace( 'description', config);





    </script>

@stop