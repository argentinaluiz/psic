@extends('layouts.app')
@section('pag_title', 'Subcategoria - Editar')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar subcategorias' => route('sub_ranks.index'), 'Editar subcategoria' ))!!}
@endsection

@section('h5-title')
     <h5>Editar subcategoria</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection