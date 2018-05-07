@extends('layouts.app')
@section('pag_title', 'Recursos - Categorias')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar recursos' => route('tools.index'), 'Adicionar Recurso' ))!!}
@endsection

@section('h5-title')
     <h5>Lista de Categorias para {{$tool->name}}</h5>
@endsection


@section('content')
    @component('admin.tools.tabs-component',['tool' => $form->getModel()])
        <div class="cleaner_h15"></div>
        <form action="{{route('category.store',$tool->id)}}" method="post">
        {{ csrf_field() }}
        <div class="input-field">
            <select class="form-control" name="category_id">
                @foreach($category as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
            <div class="cleaner_h15"></div>
            <button class="btn btn-sm btn-primary">Adicionar</button>
        </form>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Abreviação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tool->categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <form action="{{route('category.destroy',[$tool->id,$category->id])}}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button title="Deletar" class="btn btn-sm btn-danger"><i class="material-icons">deletar</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endcomponent
@endsection
