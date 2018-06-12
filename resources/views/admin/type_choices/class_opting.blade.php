@extends('layouts.app')
@section('pag_title', 'Alternativas das Questões - adicionar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar alternativas das questões' => route('type_choices.index'), 'Nova alternativa da questão' ))!!}
@endsection

@section('h5-title')
     <h5>Adicionar alternativa da questão no tipo de alternativa</h5>
@endsection


@section('content')

   <class-opting type-choice="{{$type_choice->id}}"></class-opting>

@endsection