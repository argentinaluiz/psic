@extends('layouts.app')
@section('pag_title', 'Subcategoria - Editar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar subcategorias' => route('subjects.index'), 'Editar subcategoria' ))!!}
@endsection

@section('h5-title')
     <h5>Editar subcategoria</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-sm btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection