@extends('layouts.app')
@section('pag_title', 'Sub_Subcategoria - Editar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar sub_subcategorias' => route('sub_sub_ranks.index'), 'Editar sub_subcategoria' ))!!}
@endsection

@section('h5-title')
     <h5>Editar sub_subcategoria</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection