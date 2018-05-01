@extends('layouts.app')
@section('pag_title', 'Subcategoria, ficha e subficha - adicionar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('class_informations.index'), 'Nova subcategoria, psicanalista, ficha e subficha' ))!!}
@endsection

@section('h5-title')
     <h5>Adicionar psicanalista, subcategoria, ficha e subficha na categoria</h5>
@endsection


@section('content')

    <class-meeting class-information="{{$class_information->id}}"></class-meeting>

@endsection