@extends('layouts.app')
@section('pag_title', 'Categorias - Mostrar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('class_informations.index'), 'Detalhes da categoria' ))!!}
@endsection

@section('h5-title')
     <h5>Ver categoria</h5>
@endsection

@section('content')
    @php
        $linkEdit = route('class_informations.edit',['class_informations' => $class_information->id]);
        $linkDelete = route('class_informations.destroy',['class_informations' => $class_information->id]);
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
            <td>{{$class_information->id}}</td>
        </tr>
        <tr>
            <th scope="row">Data Início</th>
            <td>{{$class_information->date_start->format('d/m/Y')}}</td>
        </tr>
        <tr>
            <th scope="row">Data Fim</th>
            <td>{{$class_information->date_start->format('d/m/Y')}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$class_information->name}}</td>
        </tr>
        <tr>
            <th scope="row">Semester</th>
            <td>{{$class_information->year}}</td>
        </tr>
        </tbody>
    </table>

@endsection
