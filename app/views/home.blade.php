@extends('layouts.base')
@section('head')
    @parent
    <link href="css/carousel.css" rel="stylesheet">
    <style id="holderjs-style" type="text/css"></style>
    <?php $title = 'O que comer? - Sua melhor receita' ?>
@stop

@section('content')

<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">O que comer?</a>

            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="/developers" id='bt_dev' onclick="show_developers();">Desenvolvedores</a></li>
                <li><a href="/receita/nova" > Cadastrar Nova Receita </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src='/img/geladeira2.jpg'>
          <div class="container">
            <div class="carousel-caption">
              <h1>O que comer?</h1>
              <p> Chega de miojo, chega de  cuscuz, agora você pode ter as melhores opções
                  baseadas no que você dispõe na geladeira</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src='/img/teste.png'>
          <div class="container">
            <div class="carousel-caption">
              <h1>Praticidade</h1>
              <p>Saiba o que cozinhar com de acordo com o que você possui e o tempo que possui</p>

            </div>
          </div>
        </div>
        <div class="item">
           <img src='/img/friends.png'>
           <div class="container">
            <div class="carousel-caption">
              <h1>Utilidade</h1>
              <p> Além dos alimentos mais saudáveis, também é possível impressionar familiares e amigos</p>

            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->

    <div class="col-sm-4 col-sm-offset-4" style="margin-top: 50px;margin-bottom: 100px;">
        {{ Form::open(['route' => 'sendEmail', 'method' => 'post']) }}

        {{ Form::label('email', 'Informe seu Email para quando o produto estiver pronto!',
        ['class' => 'awesome'] ) }}
        {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' =>'email']) }}

        {{ Form::close() }}
    </div>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div id='container-1' class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src = "/img/fork.jpg">
          <h2>Comida boa e barata</h2>
          <p> Não há motivo para não ser saudável, comidas boas, simples e rápidas de fazer</p>

        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle"  src = '/img/5.jpg' >
          <h2>Portabilidade</h2>
          <p>Disponível pra android, leve pra onde quiser, culinária simples na casa de familiares e amigos</p>

        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle"  src = '/img/6.jpg' >
          <h2>Compartilhe os Resultados</h2>
          <p>Integrado com o facebook, cozinhe e compartilhe o resultado com seus amigos, avalie as receitas, saboreie essa experiência</p>

        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <hr class="featurette-divider">
      <!-- /END THE FEATURETTES -->

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>© 2014 O que comer? </p>
      </footer>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/javascript/bootstrap.min.js"></script>
    <script src="/javascript/scriptsUI/menuconfig.js"></script>
    <script src="/javascript/docs.min.js"></script>
@stop