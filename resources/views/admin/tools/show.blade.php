@extends('layouts.app')
@section('pag_title', 'Recurso - Mostrar')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar recursos' => route('tools.index'), 'Ver pesquisa' ))!!}
@endsection

@section('h5-title')
     <h5>Ver Pesquisa</h5>
@endsection

@section('content')
     @php
        $linkEdit = route('tools.edit',['tool' => $tool->id]);
        $linkDelete = route('tools.destroy',['tool' => $tool->id]);
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
            <th scope="row">Título</th>
            <td>{{$tool->title}}</td>
        </tr>
        <tr>
            <th scope="row">Ano</th>
            <td>{{$tool->year}}</td>
        </tr>
         <tr>
            <th scope="row">Categorias</th>
            <td> {{$tool->textCategories}}</td>
        </tr>
        <tr>
            <th scope="row">Descrição</th>
            <td>{{$tool->description}}</td>
        </tr>
        <tr>
            <th scope="row">Ativa</th>
            <td>{{$tool->active?'Sim': 'Não'}}</td>
        </tr>
        </tbody>
    </table>   
@endsection