@extends('layouts.base')
@section('content')
<legend>
    <h1 class="text-center">Editar Receita</h1>
</legend>
<div class="col-sm-6 col-sm-offset-3 text-center">
    {{ Form::model($receita, ['method' => 'PATCH', 'route' => ['recipes.update', $receita->id]]) }}

    {{ Form::label('nome', 'Nome', ['class' => 'awesome'] ) }}
    {{ Form::text('nome', $receita->nome, ['class' => 'form-control', 'placeholder' =>'nome']) }}

    {{ Form::label('numPessoas', 'Numero de Pessoas:', ['class' => 'awesome'] ) }}
    <input type="number" class="form-control" name="numPessoas" value="{{$receita->numPessoas}}">

    <label for="categoria"> Categoria </label>
    {{Form::select('categoria',
    [
    'Categorias' => ['LANCHE' => 'Lanche', 'ALMOCO' => 'Almoço', 'SAUDAVEL' => 'Saudável']
    ], $receita->categoria, ['class' => 'form-control']); }}
    <label for='tempo'> Tempo em Horas </label>
    {{ Form::input('number', 'tempo', $receita->tempo, ['class' => 'form-control', 'step' => '0.5']) }}
    <label for='infNutricional'> Informação Nutricional </label>
    {{ Form::textarea('infNutricional', $receita->infoNutri, ['class' => 'form-control']) }}
    <label for='modoPreparo'> Modo de Preparo</label>
    {{ Form::textarea('modoPreparo', $receita->modoPreparo, ['class' => 'form-control']) }}

    {{ Form::label('path_img', 'Caminho da Imagem', ['class' => 'awesome'] ) }}
    {{ Form::text('path_img', $receita->path_img, ['class' => 'form-control', 'placeholder' =>'path_img']) }}
<br>
{{ Form::submit('Submit', ['class' => 'btn btn-submit']) }}
    <br>
    <br>
{{ Form::close() }}
</div>
@stop