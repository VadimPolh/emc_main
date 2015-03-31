@extends('back.template')

@section('main')

	 @include('back.partials.entete', ['title' => trans('back/specialty.dashboard') . link_to_route('specialty.create', trans('back/specialty.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'file', 'fil' => trans('back/admin.specialty')])

<p>{{ $specialty->specialty_id }}</p>
      <p>{{ $specialty->name }}</p>
      <p>{{ $specialty->chief }}</p>


@stop