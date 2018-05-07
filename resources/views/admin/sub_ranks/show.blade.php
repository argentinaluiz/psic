@extends('layouts.app')
@section('pag_title', 'Ver Subcategoria')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar subcategorias' => route('sub_ranks.index'), 'Detalhes da subcategoria' ))!!}
@endsection

@section('h5-title')
     <h5>Ver subcategoria</h5>
@endsection


@section('content')
    @php
        $linkEdit = route('sub_ranks.edit',['sub_rank' => $sub_rank->id]);
        $linkDelete = route('sub_ranks.destroy',['sub_rank' => $sub_rank->id]);
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
            <td>{{$sub_rank->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$sub_rank->name}}</td>
        </tr>
        </tbody>
    </table>

@endsection
