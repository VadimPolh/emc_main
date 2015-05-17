@extends('back.template')

@section('main')


@include('back.partials.entete', ['title' => trans('back/lection.dashboard'), 'icone' => 'user', 'fil' => link_to('objects', trans('back/lection.Users')) . ' / ' . trans('back/lection.edition')])



<div class="col-sm-12">
    {!! Form::model($lection, ['route' => ['lection.update', $lection->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
    {!! Form::control('text', 0, 'title', $errors, trans('back/lection.name')) !!}
    {!! Form::selection('objects_id', $select, null, trans('back/lection.nameobjects')) !!}
    {!! Form::control('textarea', 0, 'summary', $errors, trans('back/lection.summary')) !!}

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

        CKEDITOR.replace( 'summary', config);





    </script>

@stop