@extends('layouts.app')
@section('pag_title', 'Recurso - Editar')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar recursos' => route('tools.index'), 'Editar recurso' ))!!}
@endsection

@section('h5-title')
     <h5>Editar recurso</h5>
@endsection

@section('content')
	@component('admin.tools.tabs-component',['tool' => $form->getModel()])
		@include('form._form_errors')
        {{ Form::model($tool,['route' => ['tools.update',$tool->id], 'class' => 'form form-search form-ds', 'files' => true, 'method' => 'PUT' ]) }}
            @include('admin.tools._form')
            <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Salvar</button>
        {{ Form::close() }}
	@endcomponent
@endsection