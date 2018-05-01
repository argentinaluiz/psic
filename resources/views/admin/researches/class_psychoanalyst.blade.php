@extends('layouts.app')
@section('pag_title', 'Pesquisas - Psicanalistas')

@section('breadcrumb')
    <h2>Pesquisas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar pesquisas' => route('researches.index'), 'administração de psicanalistas' ))!!}
@endsection

@section('h5-title')
     <h5>Administração de psicanalistas na pesquisa</h5>
@endsection

@section('content')
    <!-- Componente Vue.js -->
    <class-psychoanalyst research="{{$research->id}}"></class-psychoanalyst>
@endsection