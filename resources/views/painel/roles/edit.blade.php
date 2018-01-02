@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Editar papel</h3>
            @include('form._form_errors')
            {{ Form::model($role,['route' => ['roles.update',$role->id], 'method' => 'PUT' ]) }}
                @include('painel.roles._form')
                <button type="submit" class="btn btn-sm btn-default">Salvar</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection