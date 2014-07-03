@extends('layouts.base')

@section('content')
<script src="{{ URL::asset('javascript/angular.min.js') }}"></script>
<script src="{{ URL::asset('javascript/script.js') }}"></script>
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
                    <label for="igredientes[]"> ## ingrediente.nome ## </label>
                    {{ Form::text('igredientes[]', '', ['class' => 'form-control', 'placeholder' =>'']) }}
                </div>
                <div id="medida" class="col-sm-4">
                    <label for="medidas[]"> Medida </label>
                    {{Form::select('medidas[]',
                    [
                    'Volume' => ['L' => 'Litros', 'ML' => 'MiliLitros'],
                    'Peso' => ['KG' => 'Kilos', 'G' => 'Gramas'],
                    'Unidade' => ['U' => 'Unidade']
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
        </div>
        <div id="Categorias" class="col-sm-10" style="margin: 0px;padding: 0px;">
            <label for="categoria"> Medida </label>
            {{Form::select('categoria',
            [
            'Categorias' => ['LANCHE' => 'Lanche', 'ALMOCO' => 'Almoço', 'SAUDAVEL' => 'Saudável']
            ], '', ['class' => 'form-control']); }}
        </div>
        <div class="col-sm-10" style="margin: 0px;padding: 0px;">
            <label for='tempo'> Tempo em Horas </label>
            {{ Form::input('number', 'tempo', '', ['class' => 'form-control', 'step' => '0.5']) }}
        </div>
        <div class="col-sm-10" style="margin: 0px;padding: 0px;">
            <label for='infNutricional'> Informação Nutricional </label>
            {{ Form::textarea('infNutricional', null, ['class' => 'form-control']) }}
        </div>
    </fieldset>
    {{ Form::submit('Enviar', ['class' => 'btn btn-submit']) }}
    {{ Form::close() }}
</div>
@stop