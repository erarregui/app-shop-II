@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'landing-page')

@section('styles')
    <style type="text/css">
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -me-flexbox;
            display: flex;
            flex-wrap: wrap;
        }
        .row > [class*='col-']{
            display: flex;
            flex-direction: column;
        }
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('http://nubilis.com/demo_wp/wp-content/uploads/R1A2031b.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">Bienvenido.</h1>
                        <h4>Realiza pedidos en linea y te contactaremos para coodinar la entrega.</h4>
                        <br />
                        <!-- <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i> ¿Como funciona?
                        </a> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center section-landing">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title">Por que elegir nuestros productos?</h2>
                            <h5 class="description">Puedes revisar nuestra relación completa de produtos, comparar precios y realizar tus pedidos cuando estes seguro.</h5>
                        </div>
                    </div>

                    <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title">Atendemos tus dudas</h4>
                                    <p>Atendemos rapidamente cualquir consutla que tengas via chat. No estas solo, sino que siempre estamos atentos a tus inquietude.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title">Pago seguro</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">fingerprint</i>
                                    </div>
                                    <h4 class="info-title">Informacion privada</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section text-center">
                    <h2 class="title">Nuestras categorias</h2>
                    <form class="form-inline" method="get" action="{{ url('/search') }}">
                        <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query" id="search">
                        <button class="btn btn-primary btn-just-icon" type="submit">
                            <i class="material-icons">search</i>
                        </button>
                    </form>

                    <div class="team">
                        <div class="row">
                            @foreach($categories as $category)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <img src="{{ $category->featured_image_url }}" alt="Imagne representativa de la categoria {{ $category->name }}" class="img-raised img-circle">
                                    <h4 class="title">
                                        <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                                         <br />
                                     </h4>
                                    <p class="description">{{ $category->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>

                </div>


                <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center title">¿Aún no te has registrado?</h2>
                            <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Name</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Email</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Your Messge</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4 text-center">
                                        <button class="btn btn-primary btn-raised">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

@include('includes.footer') 
@endsection



