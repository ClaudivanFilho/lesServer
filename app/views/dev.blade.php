@extends('layouts.base')
@section('head')
    @parent
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <a class="navbar-brand" href="index.html">O que comer?</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="/">Home</a></li>
            <li class="active"><a href="/developers" id='bt_dev' onclick="show_developers();">
                    Desenvolvedores</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>
<div id='container-1' class="container marketing">
    <div id='diego' class="row">
        <div class="col-lg-4">
                <img class="img-circle" src="img/diego.jpg">
        </div>
        <div class='col-lg-8'>
            <h3>Diego Pereira</h3>
            <h3>email: diegolimapereira@gmail.com</h3>
            <h3>Github: DiegoPereira</h3>
        </div>
        <br><br><br>
    </div>
    <div id='igor' class="row"  style="background-color:#EEE">
        <div class="col-lg-4">
                <img class="img-circle" src="img/igor.jpg">
        </div>
        <div class='col-lg-8'>
            <h3>Igor Silva</h3>
            <h3>email: magusdovento@gmail.com</h3>
            <h3>Github: IgorVictor</h3>
            <br><br><br>
        </div>
    </div>
    <div id='claudivan' class="row">
        <div class="col-lg-4">
                <img class="img-circle" src="img/claudivan.jpg">
        </div>
        <div class='col-lg-8'>
            <h3>José Claudivan</h3>
            <h3>email: j.claudivan.filho@gmail.com</h3>
            <h3>Github: ClaudivanFilho</h3>
            <br><br><br>
        </div>
    </div>
    <div id='rafael' class="row"  style="background-color:#EEE">
        <div class="col-lg-4">
                <img class="img-circle" src="img/rafael.jpg">
        </div>
        <div class='col-lg-8'>
            <h3>Rafael Paulino</h3>
            <h3>email: rafaeleldandil@gmail.com</h3>
            <h3>Github: Eldandil</h3>
            <br><br><br>
        </div>
    </div>

            <div id='rafael' class="row">
        <div class="col-lg-4">
                <img class="img-circle" src="img/ronaldo.jpg">
        </div>
        <div class='col-lg-8'>
            <h3>Ronaldo Regis</h3>
            <h3>email: ronaldoregis87@gmail.com</h3>
            <h3>Github: ronaldoregir</h3>
            <br><br><br>
        </div>
    </div>


<br><br><br><br><br><br>

<footer>
<p class="pull-right"><a href="#">Back to top</a></p>
<p>© 2014 O que comer? </p>
</footer>

</div><!-- /.container -->



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
