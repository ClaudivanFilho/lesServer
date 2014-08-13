@extends('layouts.base')

@section('content')
    <div class="col-sm-12">
        <h2 class="text-center" style="color: rgba(20,20,120,0.7);">{{$receita['nome']}}
            <small style="font-size:13px;margin-left:10px;">(oquecomer.herokuapp.com)</small>
        </h2>

        <div class="col-sm-4 col-sm-offset-4">
            <img src="{{$receita['path_img']}}" style="max-width:400px;border:6px groove rgba(30,200,20,0.4);margin:10px;">
            <legend>
            <label> Modo De preparo</label>
            </legend>
            <p>
                {{$receita->modoPreparo}}
            </p>
            <br>
            <legend>
            <label> Informação Nutricional</label>
            </legend>
            <p>
                {{$receita->infoNutri}}
            </p>
        </div>
    </div>
@stop