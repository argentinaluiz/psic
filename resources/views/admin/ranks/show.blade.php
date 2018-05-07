@extends('layouts.app')
@section('pag_title', 'Ver Categoria')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('ranks.index'), 'Detalhes da categoria' ))!!}
@endsection

@section('h5-title')
     <h5>Ver categoria</h5>
@endsection


@section('content')
    @php
        $linkEdit = route('ranks.edit',['rank' => $rank->id]);
        $linkDelete = route('ranks.destroy',['rank' => $rank->id]);
    @endphp
    {!! Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit) !!}
    {!!
    Button::danger(Icon::remove().' Excluir')->asLinkTo($linkDelete)
        ->addAttributes([
            'onclick' => 'event.preventDefault();if(confirm("Deseja excluir?")){document.getElementById("form-delete").submit();}'
        ])
    !!}
    @php
        $formDelete = FormBuilder::plain([
            'id' => 'form-delete',
            'url' => $linkDelete,
            'method' => 'DELETE',
            'style' => 'display:none'
        ])
    @endphp
    {!! form($formDelete) !!}
    <br/><br/>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{$rank->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$rank->name}}</td>
        </tr>
        </tbody>
    </table>

@endsection
