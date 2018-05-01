@extends('layouts.app')
@section('pag_title', 'Ver Subcategorias')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar subcategorias' => route('subjects.index'), 'Detalhes da subcategoria' ))!!}
@endsection

@section('h5-title')
     <h5>Ver subcategorias</h5>
@endsection


@section('content')
    @php
        $linkEdit = route('subjects.edit',['subject' => $subject->id]);
        $linkDelete = route('subjects.destroy',['subject' => $subject->id]);
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
            <td>{{$subject->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$subject->name}}</td>
        </tr>
        </tbody>
    </table>

@endsection
