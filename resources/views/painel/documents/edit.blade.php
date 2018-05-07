@extends('layouts.app')
@section('pag_title', 'Documentos - Editar')

@section('breadcrumb')
    <h2>Bibliotecas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar documentos' => route('documents.index'), 'Editar Documento' ))!!}
@endsection

@section('h5-title')
     <h5>Editar Documento</h5>
@endsection

@section('content')

    @include('form._form_errors')
	
	<div class="row">
		<div class="col-sm-12">
			<form role="form" action="{{ route('documents.update',$registro->id) }}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
                {{ method_field('PUT') }}
				<div class="form-group"><label>Título</label> 
					<input type="text" name="title" class="form-control" value="{{ isset($registro->title) ? $registro->title : '' }}">
				</div>
				<div class="form-group"><label>Descrição</label> 
					<input type="text" name="description" class="form-control" value="{{ isset($registro->description) ? $registro->description : '' }}">
				</div>
				 <div class="form-group">
					<div class="btn">
						<span>Atualizar documento</span>
						<input type="file" name="file">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					</div>
                </div>
				<button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Atualizar</button>
				
		</div>
	</div>

@endsection