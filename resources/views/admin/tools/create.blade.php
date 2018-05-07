@extends('layouts.app')
@section('pag_title', 'Recurso - Cadastrar')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar recursos' => route('tools.index'), 'Nova recurso' ))!!}
@endsection

@section('h5-title')
     <h5>Novo recurso</h5>
@endsection
 
@section('content')
    @include('form._form_errors')
    {{ Form::open(['route' => 'tools.store', 'class' => 'form form-search form-ds', 'files' => true]) }}
        @include('admin.tools._form')
        <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Adicionar</button>
    {{ Form::close() }}
    
@endsection
