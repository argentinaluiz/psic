@extends('layouts.app')
@section('pag_title', 'Administrar psicanalistas, subcategorias, fichas e subfichas nas perguntas')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('class_informations.index'), 'Administrar psicanalistas, subcategorias, fichas e subfichas nas perguntas' ))!!}
@endsection

@section('h5-title')
     <h5>Administrar psicanalistas, subcategorias, fichas e subfichas nas perguntas</h5>
@endsection


@section('content')

    <class-meeting class-information="{{$class_information->id}}"></class-meeting>

@endsection