@extends('layouts.app')
@section('pag_title', 'Recursos - Categorias, Subcategorias e Sub_Subcategorias')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar recursos' => route('tools.index'), 'administração de psicanalistas' ))!!}
@endsection

@section('h5-title')
     <h5>Administração de categorias, subcategorias e sub_subcategorias no recurso</h5>
@endsection

@section('content')
    <!-- Componente Vue.js -->
    <class-toolkit tool="{{$tool->id}}"></class-toolkit>
@endsection