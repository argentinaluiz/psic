@extends('layouts.app')
@section('pag_title', 'Recursos - Psicanalistas')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar recursos' => route('tools.index'), 'Administração de psicanalistas' ))!!}
@endsection

@section('h5-title')
     <h5>Administração de psicanalistas no recurso</h5>
@endsection

@section('content')
    <!-- Componente Vue.js -->
    <class-tool tool="{{$tool->id}}"></class-tool>
@endsection