@extends('back.template')


@section('main')

	@include('back.partials.entete', ['title' => trans('back/practical.dashboard'), 'icone' => 'file', 'fil' => link_to('practical', trans('back/practical.dashboard')) . ' / ' . trans('back/practical.creation')])

	<div class="col-sm-12">

		{!! Form::open(['url' => 'practical', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
		{!! Form::control('text', 0, 'title', $errors, trans('back/practical.name')) !!}
		{!! Form::selection('objects_id', $select, null, trans('back/practical.nameobjects')) !!}
		{!! Form::control('textarea', 0, 'summary', $errors, trans('back/practical.summary')) !!}




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