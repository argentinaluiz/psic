@extends('layouts.app')
@section('pag_title', 'Categorias - Pacientes')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('class_informations.index'), 'administração de pacientes' ))!!}
@endsection

@section('h5-title')
     <h5>Administração de pacientes na categoria</h5>
@endsection

@section('content')
    <!-- Componente Vue.js -->
    <class-patient class-information="{{$class_information->id}}"></class-patient>
@endsection