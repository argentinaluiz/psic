@extends('layouts.app')
@section('pag_title', 'Recurso - Documentos')

@section('breadcrumb')
    <h2>Documentos</h2>
     {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar documentos' => route('tools.index'), 'Documentos' ))!!}
@endsection

@section('h5-title')
     <h5>Galeria de documentos</h5>
@endsection

@section('content')
	@component('admin.tools.tabs-component',['tool' => $form->getModel()])
		<div class="cleaner_h15"></div>
		@can('tools-create')
			<a class="btn btn-sm btn-primary" href="{{route('tools.toolkit.create',$tool)}}"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
		@endcan
		<div class="cleaner_h15"></div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Título</th>
					<th>Descrição</th>
					<th>Link para ver o recurso</th>
					<th>Ordem</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
			@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->title ? $registro->title : '---' }}</td>
					<td>{{ $registro->description ? $registro->description : '---' }}</td>
					<td>{{ $registro->link }}</td>
					<td>{{ $registro->order }}</td>
					<td>
						<form action="{{route('tools.toolkit.delete',$registro)}}" method="post">
							@can('tools-edit')
								<a title="Editar" href="{{route('tools.toolkit.edit',$registro)}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
							@endcan
							@can('tools-delete')
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button title="Deletar" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> Excluir</button>
							@endcan
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ $registros->links() }}
	@endcomponent
@endsection
