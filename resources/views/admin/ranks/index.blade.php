@extends('layouts.app')
@section('pag_title', 'Categorias')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('ranks.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de categorias</h5>
@endsection


@section('content')
    <span class="pull-right small text-muted">Total de fichas: {{ $totalRanks }} </span>
    <br/>
    {!! Button::primary(Icon::create('plus').' Nova categoria')->asLinkTo(route('ranks.create')) !!}
    <div class="cleaner_h15"></div>
        {!!
        Table::withContents($ranks->items())
        ->striped()
        ->callback('Ações', function($field,$model){
            $linkEdit = route('ranks.edit',['rank' => $model->id]);
            $linkShow = route('ranks.show',['rank' => $model->id]);
            return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
        })
        !!}
    <div class="cleaner_h15"></div>
    {!! $ranks->links() !!}

@endsection