@extends('layouts.app')
@section('pag_title', 'Pesquisa - Documentos')

@section('breadcrumb')
    <h2>Documentos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar documentos' => route('researches.index'), 'Documentos' ))!!}
@endsection

@section('h5-title')
     <h5>Editar Galeria</h5>
@endsection

@section('content')
	<form action="{{ route('researches.arcade.update',$registro) }}" class="form-horizontal" method="post">
		{{csrf_field()}}
		{{ method_field('PUT') }}
		<div class="form-group"><label class="col-sm-2 control-label">Título</label>
			<div class="col-sm-10">
				<input type="text" name="title" class="form-control" value="{{ isset($registro->title) ? $registro->title : '' }}{{old('title')}}">
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Descrição</label>
			<div class="col-sm-10">
			<input type="text" name="description" class="form-control" value="{{ isset($registro->description) ? $registro->description : '' }}{{old('description')}}">
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Link</label>

			<div class="col-sm-10">
				<input type="text" name="link" class="form-control" value="{{ isset($registro->link) ? $registro->link : '' }}{{old('link')}}">
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Ordem</label>

			<div class="col-sm-10">
				<input type="text" name="order" class="form-control" value="{{ isset($registro->order) ? $registro->order : '' }}{{old('order')}}">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<button class="btn btn-sm btn-block btn-primary" type="submit">Atualizar</button>
			</div>
		</div>
	</form>
@endsection
