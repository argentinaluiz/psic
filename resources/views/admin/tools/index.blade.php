@extends('layouts.app')
@section('pag_title', 'Recursos - Cadastrar')

@section('breadcrumb')
    <h2>Recursos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar recursos' => route('tools.index') ))!!}
@endsection

@section('h5-title')
     <h5>Listagem de Recursos</h5>
@endsection

@section('content')
	<span class="pull-right small text-muted">Total de recursos: {{ $totalTools}}</span>
	<br/>
	@can('tools-create')
		<a class="btn btn-sm btn-primary" href="{{route('tools.create') }}"><span class="glyphicon glyphicon-plus"></span> Criar novo</a>
	@endcan
	<div class="cleaner_h15"></div>
	<table class="table table-striped exception">
		<thead>
		<tr>
			<th>Id</th>
			<th>Imagem</th>
            <th>Título</th>
			<th>Ano</th>
			<th>Descrição</th>
			<th>Categorias</th>
			<th>Ativo?</th>
			<th>Ações</th>
		</tr>
		</thead>
		<tbody>
			@foreach($tools as $tool)
				<tr>
					<td>{{ $tool->id }}</td>
					<td>
						<img class="img-responsive" src="{{url("storage/tool/{$tool->image}")}}" alt="{{$tool->id}}" style="max-width: 50px;">
					</td>
                    <td>{{ $tool->title }}</td>
					<td>{{ $tool->year }}</td>
					<td>{{ $tool->description }}</td>
					<td></td>
					<td>{{ $tool->active?'Sim': 'Não'}}</td>
					<td>
						<a class="btn btn-link" href="{{route('tools.toolkits.index',['tool' => $tool->id])}}"><span class="glyphicon glyphicon-tags"></span> Categorias</a> |
						<a class="btn btn-link" href="{{route('tools.toolkit',['tool' => $tool->id])}}"><span class="glyphicon glyphicon-book"></span> Documentos</a> |
						<a class="btn btn-link" href="{{route('tools.psychoanalysts.index',['tool' => $tool->id])}}"><span class="glyphicon glyphicon-user"></span> Psicanalistas</a> |
						<a class="btn btn-link" href="{{route('tools.edit',['tool' => $tool->id])}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
						<a class="btn btn-link" href="{{route('tools.show',['tool' => $tool->id])}}"><span class="glyphicon glyphicon-folder-open"></span> Ver</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="cleaner_h15"></div>
    {!! $tools->links() !!}

@endsection
