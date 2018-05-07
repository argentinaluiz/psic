@extends('layouts.app')
@section('pag_title', 'Criar Sub_Subcategoria')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar sub_subcategorias' => route('sub_sub_ranks.index'), 'Nova sub_subcategoria' ))!!}
@endsection

@section('h5-title')
     <h5>Nova sub_subcategoria</h5>
@endsection

@section('content')
   
    {!!
    form($form->add('insert','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}

@endsection