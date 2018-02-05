@extends('layouts.app')
@section('pag_title', 'Especialidade - adicionar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar classes' => route('class_informations.index'), 'Nova especialidade e psicanalista' ))!!}
@endsection

@section('h5-title')
     <h5>Adicionar especialidade e psicanalista na classe</h5>
@endsection


@section('content')

    <class-session class-information="{{$class_information->id}}"></class-session>

@endsection