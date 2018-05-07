@extends('layouts.app')
@section('pag_title', 'Sub_Subcategorias')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar sub_subcategorias' => route('sub_sub_ranks.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de sub_subcategorias</h5>
@endsection


@section('content')
    <span class="pull-right small text-muted">Total de sub_subcategorias: {{ $totalSubSubRanks }} </span>
    <br/>
    {!! Button::primary(Icon::create('plus').' Nova sub_subcategoria')->asLinkTo(route('sub_sub_ranks.create')) !!}
    <div class="cleaner_h15"></div>
        {!!
        Table::withContents($sub_sub_ranks->items())
        ->striped()
        ->callback('Ações', function($field,$model){
            $linkEdit = route('sub_sub_ranks.edit',['sub_sub_rank' => $model->id]);
            $linkShow = route('sub_sub_ranks.show',['sub_sub_rank' => $model->id]);
            return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
        })
        !!}
    <div class="cleaner_h15"></div>
    {!! $sub_sub_ranks->links() !!}

@endsection