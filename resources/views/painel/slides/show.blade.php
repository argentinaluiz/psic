@extends('layouts.app')
@section('pag_title', 'Slide- Mostrar')

@section('breadcrumb')
    <h2>Slides</h2>
      {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar slides' => route('slides.index'), 'Ver Slide' ))!!}
@endsection
@section('h5-title')
     <h5>Ver Slide</h5>
@endsection

@section('content')
     @php
        $linkEdit = route('slides.edit',['slide' => $slide->id]);
        $linkDelete = route('slides.destroy',['slide' => $slide->id]);
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
            <td>{{$slide->title}}</td>
        </tr>
        <tr>
            <th scope="row">Descrição</th>
            <td>{{$slide->description}}</td>
        </tr>
            <tr>
            <th scope="row">Link</th>
            <td> {{$slide->link}}</td>
        </tr>
        <tr>
            <th scope="row">Ordem</th>
            <td> {{$slide->order}}</td>
        </tr>
        <tr>
            <th scope="row">Deletar?</th>
            <td>{{$slide->disponível?'Sim': 'Não'}}</td>
        </tr>
        </tbody>
    </table>   
@endsection