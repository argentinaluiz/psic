@extends('layouts.app')
@section('pag_title', 'Pesquisas - Administrar psicanalistas e categorias nas pesquisas')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'Administrar psicanalistas e categorias nas pesquisas' ))!!}
@endsection

@section('h5-title')
     <h5>Administrar psicanalistas e categorias nas pesquisas</h5>
@endsection

@section('content')
    <!-- Componente Vue.js -->
    <class-set research="{{$research->id}}"></class-set>
@endsection