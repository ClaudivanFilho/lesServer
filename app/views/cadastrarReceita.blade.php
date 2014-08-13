@extends('layouts.base')

@section('content')
<script src="{{ URL::asset('javascript/angular.min.js') }}"></script>
<script src="{{ URL::asset('javascript/script.js') }}"></script>
<div class="container">
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="#">Cadastrar Receita</a>
        </li>
        <li>
            <a href="/ingredientes">Ingredientes</a>
        </li>
        <li>
            <a href="/receitas">Receitas</a>
        </li>
        <li>
            <a href="/receitaing">Receita Ingredientes</a>
        </li>
        <li>
            <a href="/tags">Tags</a>
        </li>
    </ul>
</nav>
<div class="page-header center-block" ng-app="MyApp">
    {{ Form::open(['url' => 'receita/nova', 'method' => 'post']) }}
    <fieldset>
        <legend> Cadastro de Nova Receita</legend>
        <div id="nome" class="col-sm-10" style="margin: 0px;padding: 0px;" >
            <label for="nome"> Nome </label>
            {{ Form::text('nome', '', ['class' => 'form-control', 'placeholder' =>'nome']) }}
        </div>
        <div id="ingredientes" class="col-sm-10" style="margin: 0px;padding: 0px;"
             ng-controller="IngredientesController">
            <div ng-repeat="ingrediente in ingredientes" >
                <div id="igred" class="col-sm-4" style="margin: 0px;padding: 0px;">
                    <label for="ingredientes[]"> ## ingrediente.nome ## </label>
                    {{ Form::text('ingredientes[]', '', ['class' => 'form-control', 'placeholder' =>'']) }}
                </div>
                <div id="medida" class="col-sm-4">
                    <label for="medidas[]"> Medida </label>
                    {{Form::select('medidas[]',
                    [
                    'Volume' => ['L' => 'Litros', 'ML' => 'MiliLitros'],
                    'Peso' => ['KG' => 'Kilos', 'G' => 'Gramas'],
                    'Unidade' => ['UND' => 'Unidade']
                    ], '', ['class' => 'form-control']); }}
                </div>
                <div id="quant" class="col-sm-2">
                    <label for="quantidades[]"> Quantidade </label>
                    {{ Form::text('quantidades[]', '', ['class' => 'form-control', 'placeholder' =>'']) }}
                </div>
                <div id="quant" class="col-sm-1" style="bottom: -25px;">
                    <button class="btn btn-danger" data-ng-click="remove($index)"> X</button>
                </div>
            </div>
            <a href="#" ng-click="add()" class="form-control btn btn-info" style="margin-top:10px;">
                + igrediente
            </a>
        </div>
        <div class="col-sm-3" style="margin: 0px;padding: 0px;">
            <label for='number'> Nota </label>
            {{ Form::selectRange('number', 1, 10, 1, ['class' => 'form-control']); }}
        </div>
        <div class="col-sm-10" style="margin: 0px;padding: 0px;">
            <label for='number'> Numero de Pessoas </label>
            {{ Form::input('number', 'numDePessoas', '', ['class' => 'form-control']) }}
            <label for="categoria"> Categoria </label>
            {{Form::select('categoria',
            [
            'Categorias' => ['LANCHE' => 'Lanche', 'ALMOCO' => 'Almoço', 'SAUDAVEL' => 'Saudável']
            ], '', ['class' => 'form-control']); }}
            <label for='tags'> Tags Separadas por Vírgula </label>
            {{ Form::text('tags', null, ['class' => 'form-control']) }}
            <label for='tempo'> Tempo em Horas </label>
            {{ Form::input('number', 'tempo', '', ['class' => 'form-control', 'step' => '0.5']) }}
            <label for='infNutricional'> Informação Nutricional </label>
            {{ Form::textarea('infNutricional', null, ['class' => 'form-control']) }}
            <label for='modoPreparo'> Modo de Preparo</label>
            {{ Form::textarea('modoPreparo', null, ['class' => 'form-control']) }}
            <label for='path_img'> Url da imagem </label>
            {{ Form::text('path_img', 'http://www.saboresdochef.com/sites/www.saboresdochef.com/files/imagecache/primera/receita-de-espetinho-de-salmao.jpg', ['class' => 'form-control']) }}
        </div>
    </fieldset>
    {{ Form::submit('Enviar', ['class' => 'btn btn-submit']) }}
    {{ Form::close() }}
</div>
</div>
@stop