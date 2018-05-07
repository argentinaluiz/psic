@extends('layouts.app')
@section('pag_title', 'Criar Categoria')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('ranks.index'), 'Nova categoria' ))!!}
@endsection

@section('h5-title')
     <h5>Nova categoria</h5>
@endsection

@section('content')
   
    {!!
    form($form->add('insert','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}

@endsection