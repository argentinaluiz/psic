@extends('layouts.app')
@section('pag_title', 'Recursos - Administrar psicanalistas, categorias, subcategorias e sub_subcategorias nos recursos')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar recursos' => route('tools.index'), 'Administrar psicanalistas, categorias, subcategorias e sub_subcategorias nos recursos' ))!!}
@endsection

@section('h5-title')
     <h5>Administrar psicanalistas, categorias, subcategorias e sub_subcategorias nos recursos</h5>
@endsection

@section('content')
    <!-- Componente Vue.js -->
    <class-toolkit tool="{{$tool->id}}"></class-toolkit>
@endsection