@extends('layouts.base')
@section('content')
@foreach (Receita::all() as $receita)
<div class="col-sm-5 well top2" style="margin:20px;">

    <img src="{{$receita->path_img}}" class="col-sm-3"/>
    <p>Nome: {{$receita->nome}}</p>
    <p>Pessoas: {{$receita->numPessoas}}</p>
    <p>Categoria: {{$receita->categoria}}</p>
    <p>Tempo de Preparo: {{$receita->tempo}}</p>
    <p>Informação Nutricional: {{$receita->infoNutri}}</p>
    <p>Modo de Preparo: {{$receita->modoPreparo}}</p>

    <div class="col-sm-12 top2" style="border-top: 1px solid rgba(0,0,0,0.2);padding-top:20px;">
        {{Form::model($receita, ['route' => ['recipes.destroy', $receita->id], 'method' => 'DELETE'])}}
        {{ Form::submit('DEL', ['class' => 'btn btn-danger pull-right']) }}
        {{ Form::close() }}
        {{link_to_route('recipes.edit', 'EDIT', $parameters = ['id' => $receita->id],
        ['class' => 'btn btn-primary pull-right', 'style' => 'margin-left:10px;margin-right:10px;']);}}
    </div>
</div>
@endforeach
@stop