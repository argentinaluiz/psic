@extends('layouts.app')
@section('pag_title', 'Subcategorias')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar subcategorias' => route('sub_ranks.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de subcategorias</h5>
@endsection


@section('content')
    <span class="pull-right small text-muted">Total de subcategorias: {{ $totalSubRanks }} </span>
    <br/>
    {!! Button::primary(Icon::create('plus').' Nova subcategoria')->asLinkTo(route('sub_ranks.create')) !!}
    <div class="cleaner_h15"></div>
        {!!
        Table::withContents($sub_ranks->items())
        ->striped()
        ->callback('Ações', function($field,$model){
            $linkEdit = route('sub_ranks.edit',['sub_rank' => $model->id]);
            $linkShow = route('sub_ranks.show',['sub_rank' => $model->id]);
            return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
        })
        !!}
    <div class="cleaner_h15"></div>
    {!! $sub_ranks->links() !!}

@endsection